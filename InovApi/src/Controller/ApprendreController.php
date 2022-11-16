<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApprendreController extends AbstractController
{
    #[Route('/apprendre', name: 'app_apprendre')]
    public function index(): Response
    {
        return $this->render('apprendre/apprendre.html.twig', [
        ]);
    }
}
