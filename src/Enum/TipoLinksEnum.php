<?php

namespace App\Enum;

enum TipoLinksEnum: string
{
    case git = 'GitHub';
    case linkedin = 'LinkedIn';
    case website = 'Website';
    case portfolio = 'Portfólio';
    case outro = 'Outro';
}
