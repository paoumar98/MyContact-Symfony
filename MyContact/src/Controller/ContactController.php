<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07/03/2019
 * Time: 07:22
 */

namespace App\Controller;


use App\Entity\Contact;
use App\Entity\ContactSearch;
use App\Form\ContactSearchType;
use App\Repository\ContactRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController {


    /**
     * @var ContactRepository
     */
    private $repository;

    public function __construct(ContactRepository $repository)
    {

        $this->repository = $repository;
    }

    /**
     * @Route("/contacts", name="contact.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request):Response
    {

        $search = new ContactSearch();
        $form = $this->createForm(ContactSearchType::class, $search);
        $form->handleRequest($request);

        $contacts = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page',1),
            12
        );
        return $this->render('contact/index.html.twig', [
            'current_menu' => 'contacts',
            'contacts' => $contacts,
            'form'  =>$form->createView()
        ]);
    }

    /**
     * * @Route("/contacts/{slug}-{id}", name="contact.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Contact $contact
     * @param string $slug
     * @return Response
     */
    public function  show(Contact $contact, string $slug):Response
    {
        if ($contact->getSlug() !== $slug) {
            return $this -> redirectToRoute('contact.show',[
                'id'=> $contact->getId(),
                'slug' => $contact->getSlug()
            ],301);
        }
        return$this->render('contact/show.html.twig',[
            'contact' => $contact,
            'current_menu' => 'contacts'

        ]);

    }
}
