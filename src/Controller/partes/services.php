<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class services extends AbstractController
{
    public function services_render(): Response
    {
        return $this->render('includes/services.html.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}