<?php

namespace App\Enum;

enum TipoLinksEnum: string
{
    case Git = 'GitHub';
    case Linkedin = 'LinkedIn';
    case Website = 'Website';
    case Portfolio = 'Portfólio';
    case Outro = 'Outro';
}
