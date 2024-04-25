<?php

namespace App\Controller;

use App\Entity\Films;
use App\Form\FilmType;
use App\Repository\FilmsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[route('/film', name: "app_film_")]
class FilmController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(FilmsRepository $filmsRepository): Response
    {
        $films = $filmsRepository->findAll();
        return $this->render('film/index.html.twig', [
            'film' => $films,
        ]);
    }



    #[Route('/{titre}', name: 'show')]
    public function show(Films $film): Response
    {
        return $this->render('film/show.html.twig', [
            'film' => $film,
        ]);
    }



    #[Route('/new', name: 'new', methods: ["GET", "POST"], priority: 1)]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(FilmType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $categorie = $form->getData();
            $em->persist($categorie);
            $em->flush();
            $this->addFlash('success', "Le film a bien été ajouté dans la BDD");
            return $this->redirectToRoute("app_film_index");
        }
        return $this->render('film/new.html.twig', [
            "formNew" => $form
        ]);
    }



    #[Route('/{id}/delete', name: 'delete', methods: ["DELETE"], priority: 1)]
    public function delete(Films $films, EntityManagerInterface $em): Response
    {
        $em->remove($films);
        $em->flush();
        $this->addFlash("success", "Le film a bien été retirer de la BDD");
        return $this->redirectToRoute("app_film_index");
    }
}
