<?php

namespace App\DataFixtures;

use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i <= 5; $i++) {
            $produit = new Produit();
            $produit->setNom("produit $i")
                ->setPrix($i + .02)
                ->setDescription("Le produit $i est bon")
                ->setImage("http://placehold.it/650x250")
                ->setDateDeCreation(new \DateTime());
            $manager->persist($produit);
        }

        $manager->flush();
    }
}
