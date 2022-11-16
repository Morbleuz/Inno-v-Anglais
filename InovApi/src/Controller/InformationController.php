<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Test;


class InformationController extends AbstractController
{
    #[Route('/information', name: 'app_information')]
    public function index(): Response
    {
        return $this->render('information/contributeur.html.twig', [
            
        ]);
    }

    #[Route('/ccm', name: 'app_ccm')]
    public function ccm(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Test::class);
        $lesTests = $repository->findAll();

        return $this->render('information/ccm.html.twig', [
            'lesTests' => $lesTests
        ]);
          
        
    }
}
