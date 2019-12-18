<?php

namespace App\Controller;

use App\Entity\TestClinique;
use App\Repository\TesteurRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestCliniqueController extends AbstractController
{
    /**
     * @Route("/test/clinique", name="test_clinique")
     */
    public function index()
    {
        return $this->render('test_clinique/index.html.twig', [
            'controller_name' => 'TestCliniqueController',
        ]);
    }

    /**
     * @Route("/produit/{id}/testClinique", name="caracTestClinique")
     */
    public function caracTest(TestClinique $leTest = null)
    {  
        return $this->render('test_clinique/caracTest.html.twig', [
            'test' => $leTest,
        ]);
              
    }
}
