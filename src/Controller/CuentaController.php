<?php

namespace App\Controller;

use App\Entity\Cuenta;
use App\Form\Cuenta1Type;
use App\Repository\CuentaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/cuenta')]
class CuentaController extends AbstractController
{
    #[Route('/', name: 'app_cuenta_index', methods: ['GET'])]
    public function index(CuentaRepository $cuentaRepository): Response
    {
        return $this->render('cuenta/index.html.twig', [
            'cuentas' => $cuentaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_cuenta_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cuentum = new Cuenta();
        $form = $this->createForm(Cuenta1Type::class, $cuentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cuentum);
            $entityManager->flush();

            return $this->redirectToRoute('app_cuenta_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cuenta/new.html.twig', [
            'cuentum' => $cuentum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cuenta_show', methods: ['GET'])]
    public function show(Cuenta $cuentum): Response
    {
        return $this->render('cuenta/show.html.twig', [
            'cuentum' => $cuentum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_cuenta_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cuenta $cuentum, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Cuenta1Type::class, $cuentum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cuenta_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('cuenta/edit.html.twig', [
            'cuentum' => $cuentum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_cuenta_delete', methods: ['POST'])]
    public function delete(Request $request, Cuenta $cuentum, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cuentum->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cuentum);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cuenta_index', [], Response::HTTP_SEE_OTHER);
    }
}
