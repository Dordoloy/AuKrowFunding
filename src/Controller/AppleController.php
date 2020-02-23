<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppleController extends AbstractController
{
    /**
     * @Route("/apple", name="apple")
     */
    public function index()
    {
        return $this->render('apple/index.html.twig', [
            'controller_name' => 'AppleController',
        ]);
    }
}
