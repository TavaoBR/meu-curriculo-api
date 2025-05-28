<?php

namespace App\Enum;

enum IdiomasEnum: string
{
    case basico = 'Básico';
    case intermediario = 'Intermediário';
    case avancado = 'Avançado';
    case fluente = 'Fluente';
    case nativo = 'Nativo';
}
