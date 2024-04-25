<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route ("/categorie" )]
class CategorieController extends AbstractController
{


    #[Route('s', name: 'app_categorie_index')]

    public function index(CategorieRepository $categorieRepository): Response
    {

        $categories = $categorieRepository->findAll();
        return $this->render('categorie/index.html.twig', [
            'categories' => $categories,
        ]);
    }



    #[Route('/{id}', name: 'app_categorie_show', methods: ["GET"], requirements: ["id" => "\d+"])]

    public function show(Categorie $categorie): Response
    {
        return $this->render('categorie/show.html.twig', [
            'categorie' => $categorie,
        ]);
    }



    #[Route('/{id}/edit', name: 'app_categorie_edit', methods: ["GET"])]

    public function edit(CategorieRepository $categorieRepository, $id): Response
    {
        $categorie = $categorieRepository->edit($id);
        return $this->render('categorie/edit.html.twig', [
            'id' => $id,
        ]);
    }



    // #[Route('/{id}/update', name: 'app_categorie_update', methods: ["POST"])]
    // public function update(CategorieRepository $categorieRepository, $id): Response
    // {
    // }



    // #[Route('/new', name: 'app_categorie_create', methods: ["POST"])]
    // public function new(CategorieRepository $categorieRepository): Response
    // {
    //     // $categorieRepository->
    // }



    // #[Route('/new', name: 'app_categorie_create', methods: ["POST"])]
    // public function create(CategorieRepository $categorieRepository): Response
    // {
    //     // $categorieRepository->
    // }
}
