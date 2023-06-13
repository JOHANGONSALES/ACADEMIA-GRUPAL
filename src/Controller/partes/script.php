<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class script extends AbstractController
{
    public function script_iniciar(): Response
    {
        return $this->render('includes/script.html.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}
?>