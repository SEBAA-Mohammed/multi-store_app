<?php

namespace App\Enums;

enum Role: string
{
    case VISITOR = 'visitor';
    case CUSTOMER = 'customer';
    case ADMIN = 'admin';
    case MANAGER = 'manager';
}
