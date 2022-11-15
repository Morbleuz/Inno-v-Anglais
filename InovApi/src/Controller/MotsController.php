<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Liste;
use App\Entity\Mot;
use App\Form\ThemeType;
use App\Form\MotType;

class MotsController extends AbstractController
{
    #[Route('/mots', name: 'app_mots')]
    public function index(Request $request): Response
    {
        $liste = new Liste();
        $mot = new Mot();
        $formTheme = $this->createForm(ThemeType::class, $liste);
        $formTheme->handleRequest($request);
        $repoTheme = $this->getDoctrine()->getRepository(Liste::class);
        $listeTheme = $repoTheme->findBy(array(), array('theme' => 'ASC'));

        $formMots = $this->createForm(MotType::class, $mot);
        $formMots->handleRequest($request);

        /*
        if ($formMots->isSubmitted() && $formMots->isValid())
        {
            
        }
        else if ($formTheme->isSubmitted() && $formTheme->isValid())
        {
            
        }
        */

        return $this->render('mots/mots.html.twig', [
            'formTheme' => $formTheme->createView(),
            'formMots' => $formMots->createView(),
            'listeTheme' => $listeTheme,
        ]);
    }
}
