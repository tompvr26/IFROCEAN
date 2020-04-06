<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }


    /**
     *  @Route("/", name="home")
     */
    public function home(){
        return $this->render('accueil/home.html.twig', [
            'title' => "Bienvenue sur la HomePage!",
        ]);
    }
}
