<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Entity\TestClinique;
use App\Entity\CategorieProduit;
use App\Repository\ProduitRepository;
use App\Repository\TestCliniqueRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\CategorieProduitRepository;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index()
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            'name' => 'Sylvain VITRY'
        ]);
    }

    /**
     * @Route("/produit/liste", name="liste")
     */
    public function liste(ProduitRepository $repo)
    {
        $lesProduits = $repo->findAll();
        return $this->render('produit/liste.html.twig', [
            'listeProduit' => $lesProduits
        ]);
    }

    /**
     * @Route("/produit/listeProduitsCateg/", name="affiche_produits_une_categorie")
     */
    public function afficheProduitCateg(CategorieProduitRepository $repoCateg, Request $laRequete)
    {
        $id = $laRequete->request->get('lstCateg');

        $laCategorie = $repoCateg->find($id);

        $lesCategs = $repoCateg->findAll();

        return $this->render('produit/listeProduitsCateg.html.twig', [
            'lesCategs' => $lesCategs,
            'laCateg' => $laCategorie
        ]);
    }


    /**
     * @Route("/produit/ajout", name="ajoute_un_produit")
     * @Route("/produit/{id}/edit", name="modif_un_produit")
     */
    public function ajoute_un_produit(Produit $produit = null, Request $request, EntityManagerInterface $manager)
    {  
       if(!$produit){
           $produit = new Produit();
           $produit->setDateCreation(new \DateTime());
       }
       
       $form = $this->createForm(ProduitType::class, $produit);

       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){

           $manager->persist($produit);
           $manager->flush();

           return $this->redirectToRoute('caracProduit', ['id' => $produit->getId()
           ]);
       }
        return $this->render('produit/ajoute.html.twig', [
            'formProduit' => $form->createView(),
            'editMode' => $produit->getId() !== null
        ]);
              
    }

    /**
     * @Route("/produit/{id}/supp", name="supprimer_produit")
     */
    public function suppProduit(Produit $leProduit = null, EntityManagerInterface $manager)
    {  
        $manager->remove($leProduit);
        $manager->flush();
        return $this->redirectToRoute('liste');
              
    }


    /**
     * @Route("/produit/{id}", name="caracProduit")
     */
    public function caracProduit(Produit $leProduit = null, TestCliniqueRepository $repo)
    {  
        $lesTests = $repo->findByProduit($leProduit);
        return $this->render('produit/caracProduit.html.twig', [
            'prod' => $leProduit,
            'testCliniques' => $lesTests
        ]);             
    }

    
    
}
