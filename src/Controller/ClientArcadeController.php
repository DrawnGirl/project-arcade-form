<?php

namespace App\Controller;

use App\Entity\ClientArcade;
use App\Form\ClientArcadeType;
use App\Repository\ClientArcadeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/client/arcade')]
class ClientArcadeController extends AbstractController
{
    #[Route('/', name: 'app_client_arcade_index', methods: ['GET'])]
    public function index(ClientArcadeRepository $clientArcadeRepository): Response
    {
        return $this->render('client_arcade/index.html.twig', [
            'client_arcades' => $clientArcadeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_client_arcade_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClientArcadeRepository $clientArcadeRepository): Response
    {
        $clientArcade = new ClientArcade();
        $form = $this->createForm(ClientArcadeType::class, $clientArcade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientArcadeRepository->save($clientArcade, true);

            return $this->redirectToRoute('app_client_arcade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_arcade/new.html.twig', [
            'client_arcade' => $clientArcade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_arcade_show', methods: ['GET'])]
    public function show(ClientArcade $clientArcade): Response
    {
        return $this->render('client_arcade/show.html.twig', [
            'client_arcade' => $clientArcade,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_client_arcade_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClientArcade $clientArcade, ClientArcadeRepository $clientArcadeRepository): Response
    {
        $form = $this->createForm(ClientArcadeType::class, $clientArcade);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $clientArcadeRepository->save($clientArcade, true);

            return $this->redirectToRoute('app_client_arcade_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('client_arcade/edit.html.twig', [
            'client_arcade' => $clientArcade,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_client_arcade_delete', methods: ['POST'])]
    public function delete(Request $request, ClientArcade $clientArcade, ClientArcadeRepository $clientArcadeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clientArcade->getId(), $request->request->get('_token'))) {
            $clientArcadeRepository->remove($clientArcade, true);
        }

        return $this->redirectToRoute('app_client_arcade_index', [], Response::HTTP_SEE_OTHER);
    }
}
