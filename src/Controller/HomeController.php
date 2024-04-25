<?php

namespace App\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: "home", methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'killian',
        ]);

        // return new Response("Bonjour tout le monde", 200);
        // return new JsonResponse("Bonjour tout le monde");

        // return $this->json("Bonjour tout le monde"); 
    }

    #[Route('/twig', name: "twigPage", methods: ['GET'])]
    public function twig(): Response
    {
        $user = [
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'age' => 32,
            'slogan' => '<center><b>Twig c\'est génial !</b></center>',
            'activated' => TRUE,
            'createdAt' => new DateTime('2020-12-21 15:27:30')
        ];

        return $this->render('home/exo1.html.twig', [
            'controller_name' => 'killian',
            "user" => $user
        ]);

        // return new Response("Bonjour tout le monde", 200);
        // return new JsonResponse("Bonjour tout le monde");

        // return $this->json("Bonjour tout le monde"); 
    }
}
