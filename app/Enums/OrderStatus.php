<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PROCESSING = 'processing';
    case SHIPPED = 'shipped';
    case DELIVERED = 'delivered';
    case CANCELLED = 'cancelled';
    case COMPLETED = 'completed';
}
