<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class navbar extends AbstractController
{
    public function navbar_render(): Response
    {
        return $this->render('includes/navbar.html.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}