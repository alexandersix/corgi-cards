<?php

namespace App\Enums;

enum CardStatus: string
{
    case Normal = 'normal';
    case Epic = 'epic';
    case Shiny = 'shiny';
}
