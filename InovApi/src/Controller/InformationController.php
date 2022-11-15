<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InformationController extends AbstractController
{
    #[Route('/information', name: 'app_information')]
    public function index(): Response
    {
        return $this->render('information/contributeur.html.twig', [
            
        ]);
    }

    #[Route('/ccm', name: 'app_ccm')]
    public function ccm(): Response
    {
        return $this->render('information/ccm.html.twig', [
          
        ]);
    }
}
