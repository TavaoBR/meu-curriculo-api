<?php

namespace App\Service\Usuario;

use App\Repository\UsuariosRepository;

class LoginService
{
    private $usuario;

    public function __construct(UsuariosRepository $usuariosRepository)
    {
        $this->usuario = $usuariosRepository;
    }

    public function logar(string $email, string $senha)
    {
        $usuario = $this->usuario->findByEmail($email);

        if (!$usuario) {
            return [
                'status' => 404,
                'message' => 'Usuário não encontrado'
            ];
        }

        if ($usuario->getTentativas() === 5) {
            return [
                'status' => 403,
                'message' => 'Conta bloqueada após várias tentativas de login inválidas.'
            ];
        }

        if (!password_verify($senha, $usuario->getSenha())) {
            $usuario->setTentativas($usuario->getTentativas() + 1);
            $this->usuario->update($usuario);
            return [
                'status' => 403,
                'message' => 'Senha inválida.'
            ];
        }

        $token = $this->gerarToken();

        $usuario->setTentativas(0);
        $usuario->setToken($token);
        $usuario->setUpdatedAt(new \DateTimeImmutable("now", new \DateTimeZone("America/Sao_Paulo")));

        $this->usuario->updateUsuario($usuario);

        return [
            'status' => 200,
            'message' => 'Login realizado com sucesso',
            'token' => $token
        ];
    }

    private function gerarToken()
    {
        if (function_exists('com_create_guid') === true) {
            return trim(com_create_guid(), '{}');
        }

        return sprintf(
            '%04X%04X-%04X-%04X-%04X-%04X%04X%04X',
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(16384, 20479),
            mt_rand(32768, 49151),
            mt_rand(0, 65535),
            mt_rand(0, 65535),
            mt_rand(0, 65535)
        );
    }
}
