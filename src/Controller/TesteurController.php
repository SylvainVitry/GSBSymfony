<?php

namespace App\Controller;

use App\Entity\Testeur;
use App\Form\TesteurType;
use App\Entity\TestClinique;
use App\Repository\TesteurRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TesteurController extends AbstractController
{
    /**
     * @Route("/testeur/", name="testeur_index")
     */
    public function index(TesteurRepository $lesTesteurs)
    {
        return $this->render('testeur/index.html.twig', [
            'controller_name' => 'TesteurController',
            'testeurs' => $lesTesteurs->findAll()
        ]);
    }

    /**
     * @Route("/{id}/testeur", name="listeTesteur")
     */
    public function listeTesteur(TestClinique $leTest = null)
    {  
        return $this->render('test_clinique/caracTest.html.twig', [
            'test' => $leTest,
        ]);
              
    }

    /**
     * @Route("/testeur/new", name="testeur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $testeur = new Testeur();
        $testeur->setDateCreation(new \DateTime());
        $form = $this->createForm(TesteurType::class, $testeur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($testeur);
            $entityManager->flush();

            return $this->redirectToRoute('testeur_index');
        }

        return $this->render('testeur/new.html.twig', [
            'testeur' => $testeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/testeur/{id}/edit", name="testeur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Testeur $testeur): Response
    {
            
        $form = $this->createForm(TesteurType::class, $testeur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('testeur_index');
        }

        return $this->render('testeur/edit.html.twig', [
            'testeur' => $testeur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/testeur/{id}/supp", name="testeur_delete", methods="POST")
     */
    public function delete(Request $request, Testeur $testeur): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($testeur);
        $entityManager->flush();

        return $this->redirectToRoute('testeur_index');
    }

    /**
     * @Route("/testeur/{id}", name="testeur_show", methods={"GET"})
     */
    public function show(Testeur $testeur): Response
    {
        return $this->render('testeur/show.html.twig', [
            'testeur' => $testeur,
        ]);
    }

    
}
