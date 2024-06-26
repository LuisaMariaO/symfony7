<?php
// src/Controller/SecurityController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Redirigir si el usuario ya está autenticado
        if ($this->getUser()) {
            return $this->redirectToRoute('dashboard');
        }

        // Obtener el error de login si lo hay
        $error = $authenticationUtils->getLastAuthenticationError();

        // Último email ingresado por el usuario
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
        // El controlador puede estar vacío, Symfony gestionará la lógica de logout automáticamente.
        throw new \Exception('This should never be reached!');
    }

    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(): Response
    {
        return $this->render('<h1>Hola</h1>');
    }
}
