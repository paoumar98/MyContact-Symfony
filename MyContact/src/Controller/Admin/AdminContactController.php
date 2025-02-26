<?php
namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class AdminContactController extends AbstractController
{

    /**
     * @var ContactRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ContactRepository $repository,ObjectManager $em )
    {
        $this->repository = $repository;
        $this->em =$em;
    }

    /**
     * @Route("/admin", name="admin.contact.index")
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function index()
    {
        $contacts=$this->repository->findAll();
        return $this->render('admin/contact/index.html.twig',compact('contacts'));
    }

    /**
     * @Route("/admin/contact/create", name="admin.contact.new")
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws \Exception
     */

    public function new(Request $request) {
        $contact= new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $this->em->persist($contact);
            $this->em->flush();
            $this->addFlash('success', 'Bien créé avec succés');
            return $this->redirectToRoute('admin.contact.index');
        }
        return $this->render('admin/contact/new.html.twig',[
            'contact' =>$contact,
            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route("/admin/contact/{id}", name="admin.contact.edit", methods="GET|POST")
     * @param Contact $contact
     * @param Request $request
     * @param CacheManager $cacheManager
     * @param UploaderHelper $helper
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(Contact $contact, Request $request, CacheManager $cacheManager, UploaderHelper $helper){

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            if ($contact->getImageFile() instanceof UploadedFile) {
                $cacheManager->remove($helper->asset($contact, 'imageFile'));
            }
            $this->em->flush();
            $this->addFlash('success', 'Bien modifié avec succés');
            return $this->redirectToRoute('admin.contact.index');
        }

        return $this->render('admin/contact/edit.html.twig',[
            'contact' =>$contact,
            'form'=>$form->createView()
        ]);

    }

    /**
     * @Route("/admin/contact/{id}", name="admin.contact.delete", methods="DELETE")
     * @param Contact $contact
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Contact $contact, Request $request){

        if ($this->isCsrfTokenValid('delete'. $contact->getId(), $request->get('_token'))){
            $this->em->remove($contact);
            $this->em->flush();
            $this->addFlash('success', 'Bien supprimé avec succés');
        }

        return $this->redirectToRoute('admin.contact.index');
    }
}