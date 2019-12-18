<?php

namespace App\Controller;

use App\Entity\CategorieProduit;
use App\Form\CategorieProduitType;
use App\Entity\TestClinique;
use App\Repository\CategorieProduitRepository;
use App\Repository\TestCliniqueRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieProduitController extends AbstractController
{

    /**
     * @Route("/categorie_produit/listeCateg", name="listeCateg")
     */
    public function listeCateg(CategorieProduitRepository $repo)
    {
        $lesCategs = $repo->findAll();
        return $this->render('categorie_produit/listeProduit.html.twig', [
            'controller_name' => 'CategorieProduitController',
            'lesCategs' => $lesCategs
        ]);
    }

}
