<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cuenta;

class CrearCuentaController extends AbstractController
{
    #[Route('/crear/cuenta', name: 'app_crear_cuenta')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Crear una nueva instancia de la entidad Cuenta
        $cuenta = new Cuenta();

        // Crear el formulario utilizando el método createForm del controlador
        $form = $this->createFormBuilder($cuenta)
            ->add('cliente', null, [
                'label' => 'Identificación del cliente:',
            ])
            ->add('saldo', null, [
                'label' => 'Saldo inicial:',
            ])
            ->getForm();

        // Manejar la solicitud del formulario
        $form->handleRequest($request);

        // Si el formulario es enviado y es válido, persistir la cuenta en la base de datos
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cuenta);
            $entityManager->flush();

            // Redirigir a una página de éxito o hacer cualquier otra acción
            return $this->redirectToRoute('app_home');
        }

        // Renderizar la plantilla con el formulario
        return $this->render('crear_cuenta/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    
}
