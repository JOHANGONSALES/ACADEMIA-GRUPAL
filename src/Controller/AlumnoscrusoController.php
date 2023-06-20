<?php

namespace App\Controller;

use App\Entity\Alumnoscruso;
use App\Form\AlumnoscrusoType;
use App\Repository\AlumnoscrusoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/alumnoscruso')]
class AlumnoscrusoController extends AbstractController
{
    #[Route('/', name: 'app_alumnoscruso_index', methods: ['GET'])]
    public function index(AlumnoscrusoRepository $alumnoscrusoRepository): Response
    {
        return $this->render('alumnoscruso/index.html.twig', [
            'alumnoscrusos' => $alumnoscrusoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_alumnoscruso_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AlumnoscrusoRepository $alumnoscrusoRepository): Response
    {
        $alumnoscruso = new Alumnoscruso();
        $form = $this->createForm(AlumnoscrusoType::class, $alumnoscruso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumnoscrusoRepository->save($alumnoscruso, true);

            return $this->redirectToRoute('app_alumnoscruso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alumnoscruso/new.html.twig', [
            'alumnoscruso' => $alumnoscruso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alumnoscruso_show', methods: ['GET'])]
    public function show(Alumnoscruso $alumnoscruso): Response
    {
        return $this->render('alumnoscruso/show.html.twig', [
            'alumnoscruso' => $alumnoscruso,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_alumnoscruso_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Alumnoscruso $alumnoscruso, AlumnoscrusoRepository $alumnoscrusoRepository): Response
    {
        $form = $this->createForm(AlumnoscrusoType::class, $alumnoscruso);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $alumnoscrusoRepository->save($alumnoscruso, true);

            return $this->redirectToRoute('app_alumnoscruso_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('alumnoscruso/edit.html.twig', [
            'alumnoscruso' => $alumnoscruso,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_alumnoscruso_delete', methods: ['POST'])]
    public function delete(Request $request, Alumnoscruso $alumnoscruso, AlumnoscrusoRepository $alumnoscrusoRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$alumnoscruso->getId(), $request->request->get('_token'))) {
            $alumnoscrusoRepository->remove($alumnoscruso, true);
        }

        return $this->redirectToRoute('app_alumnoscruso_index', [], Response::HTTP_SEE_OTHER);
    }
}
