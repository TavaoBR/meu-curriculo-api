<?php

namespace App\Service\Curriculo;

use App\Repository\CurriculosRepository;

class CurriculoService
{
    private $curriculo;

    public function __construct(CurriculosRepository $curriculosRepository)
    {
        $this->curriculo = $curriculosRepository;
    }

    public function criar(array $data, int $usuario)
    {
        $curriculo = [
            'usuario' => $usuario,
            'nome' => $data['nome'],
            'titulo' => $data['titulo'],
            'area' => $data['area'],
            'uf' => $data['uf'],
            'cidade' => $data['cidade'],
            'genero' => $data['genero'],
            'civil' => $data['civil'],
            'nascimento' => $data['nascimento'],
            'country' => $data['country'],
            'telefone' => $data['telefone']
        ];

        try {
            $this->curriculo->novo($curriculo);
            return [
                'status' => 201,
                'curriculoId' => $this->curriculo->getId(),
                'message' => 'Dados inicias do curriculo criado com sucesso',
            ];
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => 'Ocorreu algum erro inesperado',
                'errors' => $e->getMessage(),
            ];
        }
    }
}
