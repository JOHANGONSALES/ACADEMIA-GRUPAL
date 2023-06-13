<?php
namespace App\Controller\partes;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class porfolio extends AbstractController
{
    public function porfolio_iniciar(): Response
    {
        return $this->render('includes/porfolio.php.twig', [
           'devuelto_dos' => 'uno mas'
        ]);
    }

    
}
?>