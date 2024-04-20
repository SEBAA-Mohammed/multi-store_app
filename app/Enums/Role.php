<?php

namespace App\Enums;

enum Role: string
{
    case MANAGER = 'manager';
    case ADMIN = 'admin';
    case CLIENT = 'client';
}
