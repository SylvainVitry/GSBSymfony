<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Produit;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1;$i <= 20; $i++){
            $produit = new Produit();
            $produit -> setNom("Produit numéro $i")
                     -> setPrix(10 + $i)
                     -> setRemarques("Remarque numéro $i")
                     -> setDateCreation(new \DateTime()); 
                    
            $manager->persist($produit);
        }

        $manager->flush();
    }
}
