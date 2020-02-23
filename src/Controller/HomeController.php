<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Project;
use App\Entity\Status;
use App\Entity\Tag;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
}
