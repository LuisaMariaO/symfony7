<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TransaccionesController extends AbstractController
{
    #[Route('/transacciones', name: 'app_transacciones')]
    public function index(): Response
    {
        return $this->render('transacciones/index.html.twig', [
            'controller_name' => 'TransaccionesController',
        ]);
    }
}
