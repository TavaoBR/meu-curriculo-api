<?php

namespace App\Service\Usuario;

use App\Repository\UsuariosRepository;

class RegistroService
{
    private $usuarios;
    public function __construct(UsuariosRepository $usuariosRepository)
    {
        $this->usuarios = $usuariosRepository;
    }

    private function contaExistente(string $email)
    {
        if ($this->usuarios->findByEmail($email)) {
            return [
                'status' => 409,
                'message' => 'Usuario já cadastrado'
            ];
        }

        return true;
    }

    public function salvar(array $data)
    {
        $verificacao = $this->contaExistente($data['email']);
        if ($verificacao !== true) {
            return $verificacao;
        }

        $usuario = [
            'email' => $data['email'],
            'senha' => password_hash($data['senha'], PASSWORD_DEFAULT)
        ];

        try {
            $this->usuarios->novo($usuario);
            return [
                'status' => 201,
                'message' => 'Conta criada com sucesso',
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
