<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\CursosRepository;


class porfolio extends AbstractController
{
    public function porfolio_iniciar(CursosRepository $cursosRepository): Response
    {
        return $this->render('includes/porfolio.php.twig', [
            'tipos' => $cursosRepository->getDistinct(),
            'cursos' => $cursosRepository->findAll(),
        ]);
    }

    
}
?>