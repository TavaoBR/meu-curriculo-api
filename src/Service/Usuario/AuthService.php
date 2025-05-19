<?php

namespace App\Service\Usuario;

use App\Repository\UsuariosRepository;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthService
{
    private $usuario;

    public function __construct(UsuariosRepository $usuariosRepository)
    {
        $this->usuario = $usuariosRepository;
    }


    private function headers()
    {
        $headers = getallheaders();
        // Converta todas as chaves do array para letras minúsculas (opcional)
        $headers = array_change_key_case($headers, CASE_LOWER);

        $headers = str_replace('=', '', $headers);

        return [$headers['x-token-cv'], $headers];
    }

    private function autenticar(string $token)
    {
        $session = $this->usuario->findByToken($token);
        if ($session != null) {
            return [
                'id' => $session->getId(),
                'token' => $session->getToken()
            ];
        } else {
            return false;
        }
    }

    public function validarTokenAuth()
    {
        $token = $this->headers()[0];

        if (!isset($token)) {
            return [
                'status' => 400,
                'message' => 'Token inválido: cabeçalho ausente',
                'headers' => $this->headers()[1]
            ];
        }

        $auth = $this->autenticar($token);

        return $auth ?
            ['status' => 200, 'message' => 'Autorizado.'] :
            ['status' => 401, 'message' => 'Não autorizado.', 'headers' => $this->headers()[1]];
    }

    public function is_autenticado()
    {
        $token = $this->headers()[0];

        if (!isset($token)) {
            throw new UnauthorizedHttpException('Token inválido: cabeçalho ausente.');
        }

        $auth = $this->autenticar($token);

        if ($auth === false) {
            throw new UnauthorizedHttpException('Token invalido');
        }

        return $auth;
    }
}
