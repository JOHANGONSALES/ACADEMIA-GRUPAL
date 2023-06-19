<?php

namespace App\Controller;

use App\Entity\Cursos;
use App\Form\Cursos1Type;
use App\Repository\CursosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cursos')]
class CursosController extends AbstractController
{
    #[Route('/', name: 'app_cursos_index', methods: ['GET'])]
    public function index(CursosRepository $cursosRepository): Response
    {
        return $this->render('cursos/index.html.twig', [
            'cursos' => $cursosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cursos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CursosRepository $cursosRepository): Response
    {
        $curso = new Cursos();
        $form = $this->createForm(Cursos1Type::class, $curso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $cursosRepository->save($curso, true);
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();
            $nombreArchivo = '1';
             if ($uploadedFile) {
               //$destination = $this->getParameter('kernel.projectdir').'/public/uploads';
                $destination = 'uploads';
                $nombreArchivo = "subido".uniqid().".".$uploadedFile->guessExtension();
                $uploadedFile->move(
                   $destination,
                  $nombreArchivo
              );
            }
                $curso->setImagen($nombreArchivo);
                $curso -> setEstado(1);
                $cursosRepository->save($curso, true);
            return $this->redirectToRoute('app_cursos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cursos/new.html.twig', [
            'curso' => $curso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cursos_show', methods: ['GET'])]
    public function show(Cursos $curso): Response
    {
        return $this->render('cursos/show.html.twig', [
            'curso' => $curso,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cursos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cursos $curso, CursosRepository $cursosRepository): Response
    {
        $form = $this->createForm(Cursos1Type::class, $curso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cursosRepository->save($curso, true);

            return $this->redirectToRoute('app_cursos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cursos/edit.html.twig', [
            'curso' => $curso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cursos_delete', methods: ['POST'])]
    public function delete(Request $request, Cursos $curso, CursosRepository $cursosRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$curso->getId(), $request->request->get('_token'))) {
            $cursosRepository->remove($curso, true);
        }

        return $this->redirectToRoute('app_cursos_index', [], Response::HTTP_SEE_OTHER);
    }
}
