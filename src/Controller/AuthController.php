<?php

namespace App\Controller;

use App\Service\Usuario\AuthService;
use App\Service\Usuario\LoginService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/auth')]
final class AuthController extends AbstractController
{
    #[Route('/login', methods: ['POST'])]
    public function logar(Request $request, LoginService $login): JsonResponse
    {
        $data = ($request->headers->get('Content-Type') == 'application/json') ? $request->toArray() : $request->request->all();

        $email = $data['email'];
        $senha = $data['senha'];

        $result = $login->logar($email, $senha);

        return $this->json($result, $result['status']);
    }

    #[Route('/verifica', methods: ['GET'])]
    public function validarAuth(AuthService $authService)
    {
        $auth = $authService->validarTokenAuth();

        return $this->json($auth, $auth['status']);
    }
}
