<?php

namespace App\Controller;

use App\Entity\Alumnos;
use App\Form\AlumnosType;
use App\Repository\AlumnosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class Index extends AbstractController
{
    #[Route('/', name: 'app_index_index', methods: ['GET'])]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'inicio' => "__",
        ]);
    }

    
}
