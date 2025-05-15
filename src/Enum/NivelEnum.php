<?php

namespace App\Enum;

enum NivelEnum: string
{
    case EnsinoMedio = 'Ensino Médio';
    case Tecnico = 'Técnico';
    case Graduacao = 'Graduação';
    case PosGraducao = 'Pós-graduação';
    case Mestrado = 'Mestrado';
    case Doutorado = 'Doutorado';
}
