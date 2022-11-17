<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\TestRepository;
use App\Repository\ListeRepository;
use App\Entity\Liste;
use App\Entity\Test;


class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }
        
        $repository = $doctrine->getRepository(Test::class);

        $lesTests = $repository->findAll();

        return $this->render('test/index.html.twig', [
            'lesTests' => $lesTests
        ]);
    }

    #[Route('/test/{id}', name: 'app_test_id',requirements: ['id' => '\d+'])]
    public function index2(ManagerRegistry $doctrine,int $id): Response
    {   
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('app_login');
        }

        $repository = $doctrine->getRepository(Test::class);
        $repositoryListe = $doctrine->getRepository(Liste::class);

        $test = $repository->findOneBy(array('id' => $id));
        $liste = $repositoryListe->findOneBy(array('id' => $test->getLier()->getId()));

        

        return $this->render('test/test.html.twig', [
            'test' => $test, 
            'liste'=>$liste
        ]);
    }
}
