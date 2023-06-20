<?php
namespace App\Controller\option;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
class images
{
    public function Subir_imagen($uploadedFile)
    {
        /** @var UploadedFile $uploadedFile */
        //$uploadedFile = $form['imageFile']->getData();
        $nombreArchivo = '1';
        $destination = 'uploads';
        $nombreArchivo = "subido".uniqid().".".$uploadedFile->guessExtension();
        $uploadedFile->move(
            $destination,
            $nombreArchivo
        );

        return $nombreArchivo;
    }

    
}
?>