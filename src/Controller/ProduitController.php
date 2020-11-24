<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(): Response
    {
        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
        ]);
    }

    /**
     * @Route("/produit/nouvelle", name="nouvelle_route")
     *
     */
    public function nouvelleRoute()
    {
        return $this->render('produit/nouvelle.html.twig');
    }

    /**
     * @Route("/produit/create", name="create_route")
     *
     */
    public function createRoute()
    {
        return $this->render('produit/create.html.twig');
    }
}
