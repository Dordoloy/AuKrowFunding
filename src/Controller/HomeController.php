<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Project;
use App\Entity\Status;
use App\Entity\Tag;
use App\Form\ContactType;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ManagerRegistry $registry
     * @return Response
     */
    public function index(ManagerRegistry $registry): Response
    {
        return $this->render('home/index.html.twig', [
            'Projects' => $registry->getRepository(Project::class)->findAll(),
            'Tags' => $registry->getRepository(Tag::class)->findAll(),
            'Category' => $registry->getRepository(Category::class)->findAll(),
            'Status' => $registry->getRepository(Status::class)->findAll()
        ]);
    }

    /**
     * @Route("/help", name="help")
     * @return Response
     */
    public function help(): Response
    {
        return $this->render('home/help.html.twig');
    }

    /**
     * @Route("/contact", name="contact")
     * @return Response
     */
    public function contact():Response
    {
        $form = $this->createForm(ContactType::class);
        return $this->render('home/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
	/**
     * @Route("/about", name="about")
     * @return Response
     */
    public function about():Response{
        return $this->render('home/about.html.twig');
    }
}
