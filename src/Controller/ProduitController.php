<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Produit::class);
        $produits = $repo->findAll();
        //dd($produits);

        return $this->render('produit/index.html.twig', [
            'controller_name' => 'ProduitController',
            "produits" => $produits
        ]);
    }

    /**
     * @Route("/", name="home")
     *
     */
    public function home()
    {
        return $this->render('produit/home.html.twig');
    }

    /**
     * @Route("/produit/nouvelle", name="nouvelle")
     *
     */
    public function nouvelleRoute()
    {
        $age = 34;
        $prenom = "Jacky";
        return $this->render('produit/nouvelle.html.twig', [
            "monage" => $age,
            "monprenom" => $prenom

        ]);
    }

    /**
     * @Route("/produit/create", name="create")
     *
     */
    public function createRoute()
    {
        return $this->render('produit/create.html.twig');
    }

    /**
     * @Route("/produit/createForm", name="createForm")
     *
     */
    public function createFormulaire(Request $request, ObjectManager $manager)
    {
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($produit);
            $manager->flush();
            return $this->redirectToRoute('affiche_produit', ['id' => $produit->getId()]);
        }
        return $this->render('produit/create.html.twig', [
            "formulaire" => $form->createView()
        ]);
    }

    /**
     * @Route("/produit/{id}", name="affiche_produit")
     *
     */
    public function affichage($id)
    {
        $repository = $this->getDoctrine()->getRepository(Produit::class);
        $produit = $repository->find($id);
        return $this->render('produit/affiche.html.twig', [
            "produit" => $produit
        ]);
    }
}
