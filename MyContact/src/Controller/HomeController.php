<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 07/03/2019
 * Time: 05:02
 */
namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController
{
    /**
     * @var Environment
     */
    private $twig;

    public function __construct(Environment $twig)
    {
        $this ->twig = $twig;
    }

    /**
     * @Route("/", name="home")
     * @param ContactRepository $repository
     * @return Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */

    public function index(ContactRepository $repository):Response
    {
        $contacts = $repository -> findLatest();
        return new Response($this->twig->render('pages/home.html.twig',[
            'contacts' =>$contacts
        ]));
    }
}
