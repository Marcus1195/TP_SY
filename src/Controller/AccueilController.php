<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AccueilController extends AbstractController
{
    /**
     * @Route("/accueil", name="app_accueil")
     */


    public function index(): Response
    {

        $accueil= "Hello Bienvenue sur la page d'Accueil";


        return $this->render('accueil/index.html.twig', 
        [
            "accueil" => $accueil,
         
        ]);
    }
  }

