<?php

namespace App\Controller;

use App\Entity\Alumnoscursos;
use App\Form\AlumnoscursosType;
use App\Repository\AlumnoscursosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/alumnoscursos')]
class AlumnoscursosController extends AbstractController
{
    #[Route('/', name: 'app_alumnoscursos_index', methods: ['GET'])]
    public function index(AlumnoscursosRepository $alumnoscursosRepository): Response
    {
        return $this->render('alumnoscursos/index.html.twig', [
            'alumnoscursos' => $alumnoscursosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_alumnoscursos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AlumnoscursosRepository $alumnoscursosRepository): Response
    {
        $alumnoscurso = new Alumnoscursos();
        $form = $this->createForm(AlumnoscursosType::class, $alumnoscurso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumnoscursosRepository->save($alumnoscurso, true);

            return $this->redirectToRoute('app_alumnoscursos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alumnoscursos/new.html.twig', [
            'alumnoscurso' => $alumnoscurso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alumnoscursos_show', methods: ['GET'])]
    public function show(Alumnoscursos $alumnoscurso): Response
    {
        return $this->render('alumnoscursos/show.html.twig', [
            'alumnoscurso' => $alumnoscurso,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_alumnoscursos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Alumnoscursos $alumnoscurso, AlumnoscursosRepository $alumnoscursosRepository): Response
    {
        $form = $this->createForm(AlumnoscursosType::class, $alumnoscurso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumnoscursosRepository->save($alumnoscurso, true);

            return $this->redirectToRoute('app_alumnoscursos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alumnoscursos/edit.html.twig', [
            'alumnoscurso' => $alumnoscurso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alumnoscursos_delete', methods: ['POST'])]
    public function delete(Request $request, Alumnoscursos $alumnoscurso, AlumnoscursosRepository $alumnoscursosRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alumnoscurso->getId(), $request->request->get('_token'))) {
            $alumnoscursosRepository->remove($alumnoscurso, true);
        }

        return $this->redirectToRoute('app_alumnoscursos_index', [], Response::HTTP_SEE_OTHER);
    }
}
