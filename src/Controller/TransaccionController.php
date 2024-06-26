<?php

namespace App\Controller;

use App\Entity\Transaccion;
use App\Form\TransaccionType;
use App\Repository\TransaccionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/transaccion')]
class TransaccionController extends AbstractController
{
    #[Route('/', name: 'app_transaccion_index', methods: ['GET'])]
    public function index(TransaccionRepository $transaccionRepository): Response
    {
        return $this->render('transaccion/index.html.twig', [
            'transaccions' => $transaccionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_transaccion_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $transaccion = new Transaccion();
        $form = $this->createForm(TransaccionType::class, $transaccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($transaccion);
            $entityManager->flush();

            return $this->redirectToRoute('app_transaccion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('transaccion/new.html.twig', [
            'transaccion' => $transaccion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transaccion_show', methods: ['GET'])]
    public function show(Transaccion $transaccion): Response
    {
        return $this->render('transaccion/show.html.twig', [
            'transaccion' => $transaccion,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_transaccion_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Transaccion $transaccion, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TransaccionType::class, $transaccion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_transaccion_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('transaccion/edit.html.twig', [
            'transaccion' => $transaccion,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_transaccion_delete', methods: ['POST'])]
    public function delete(Request $request, Transaccion $transaccion, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$transaccion->getId(), $request->request->get('_token'))) {
            $entityManager->remove($transaccion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_transaccion_index', [], Response::HTTP_SEE_OTHER);
    }
}
