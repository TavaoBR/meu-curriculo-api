<?php

namespace App\Controller;

use App\Service\Curriculo\CurriculoService;
use App\Service\Usuario\AuthService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

#[Route('/curriculo')]
final class CurriculoController extends AbstractController
{
    private $auth;

    public function __construct(AuthService $authService)
    {
        $this->auth = $authService;
    }

    #[Route('/criar', methods: ['POST'])]
    public function criar(Request $request, CurriculoService $CurriculoService): JsonResponse
    {

        $this->auth->is_autenticado();

        $usuario = $this->auth->is_autenticado()[0];

        $data = ($request->headers->get('Content-Type') == 'application/json') ? $request->toArray() : $request->request->all();

        $result = $CurriculoService->criar($data, $usuario);

        return $this->json($result, $result['status']);
    }

    #[Route('/experiencias/{id}', methods: ['POST'])]
    public function addExperiencias() {}

    #[Route('/formacoes/{id}', methods: ['POST'])]
    public function addFormacoes() {}

    #[Route('/idiomas/{id}', methods: ['POST'])]
    public function addIdiomas() {}

    #[Route('/projetos/{id}', methods: ['POST'])]
    public function addProjetos() {}

    #[Route('/links/{id}', methods: ['POST'])]
    public function addLinks() {}

    #[Route('/resumos/{id}', methods: ['POST'])]
    public function addResumos() {}

    #[Route('/habilidades/{id}', methods: ['POST'])]
    public function addHabilidades() {}
}
