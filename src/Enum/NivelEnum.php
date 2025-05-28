<?php

namespace App\Enum;

enum NivelEnum: string
{
    case ensinoMedio = 'Ensino Médio';
    case tecnico = 'Técnico';
    case graduacao = 'Graduação';
    case posGraducao = 'Pós-graduação';
    case mestrado = 'Mestrado';
    case doutorado = 'Doutorado';
}
