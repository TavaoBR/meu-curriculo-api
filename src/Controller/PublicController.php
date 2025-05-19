<?php

namespace App\Controller;

use App\Service\Usuario\RegistroService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/public')]
final class PublicController extends AbstractController
{
    #[Route('/criar-conta', methods: ['POST'])]
    public function criarConta(Request $request, RegistroService $registroService): JsonResponse
    {
        $data = ($request->headers->get('Content-Type') == 'application/json') ? $request->toArray() : $request->request->all();

        $result = $registroService->salvar($data);

        return $this->json($result, $result['status']);
    }
}
