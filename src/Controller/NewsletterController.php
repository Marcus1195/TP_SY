<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsletterController extends AbstractController
{
    /**
     * @Route("/newsletter", name="app_newsletter")
     */
    public function index(Request $request): Response
    {
        // on créé un formulaire de type contact Form/ContactType
        $formulaire=$this->createForm(ContactType::class);
        //Lit les données envoyé via l'url
        $formulaire->handleRequest($request);

        // on vérifie si les donnée sont envoyé
        if ($formulaire->isSubmitted()) {

            // on recuperer les donnée envoyé
            $data=$formulaire->getData();
            // on redirige vers la page envoye.html.twig
            // avec la variable data['nom']
            return $this->renderForm('newsletter/envoyer.html.twig', [
                'data'=>$data
            ]);
        }
        // si non on renvoie vers la page de contact avec le form
        else {
            return $this->renderForm('newsletter/index.html.twig', [
                'form'=>$formulaire
            ]);
        }
    }
}
