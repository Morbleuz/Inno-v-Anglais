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
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $returnValue = '';

        $liste = new Liste();
        $mot = new Mot();
        $formTheme = $this->createForm(ThemeType::class, $liste);
        $formTheme->handleRequest($request);
        $repoTheme = $this->getDoctrine()->getRepository(Liste::class);
        $listeTheme = $repoTheme->findBy(array(), array('theme' => 'ASC'));

        $formMots = $this->createForm(MotType::class, $mot);
        $formMots->handleRequest($request);

        if ($formMots->isSubmitted() && $formMots->isValid())
        {
            
        }
        else if ($formTheme->isSubmitted() && $formTheme->isValid())
        {
            $liste->setTheme($formTheme->get('theme')->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($liste);
            $em->flush();
        }
        else 
        {
            switch($request->request->get('type'))
            {
                case 'editMot':
                    $formID = $request->request->get('id');
                    $motFrancais = $request->request->get('motFrancais');
                    $motAnglais = $request->request->get('motAnglais');
                    //$appartenir = $request->request->get('');
        
                    $mot = $this->getDoctrine()->getRepository(Mot::class)->findOneByID($formID);
                    $mot->setMotAnglais($motAnglais);
                    $mot->setMotFrancais($motFrancais);
        
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($mot);
                    $em->flush();

                case 'deleteMot':
                    $formID = $request->request->get('id');

                    $mot = $this->getDoctrine()->getRepository(Mot::class)->findOneByID($formID);

                    $em = $this->getDoctrine()->getManager();
                    $em->remove($mot);
                    $em->flush();
                case 'deleteTheme':
                    
            }
        }

        return $this->render('mots/mots.html.twig', [
            'formTheme' => $formTheme->createView(),
            'formMots' => $formMots->createView(),
            'listeTheme' => $listeTheme,
        ]);
    }
}
