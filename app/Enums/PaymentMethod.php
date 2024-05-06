<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case NONE = 'none';
    case CARD = 'card';
    case PAYPAL = 'paypal';
    case WIRE_TRANSFER = 'wire-transfer';
    case GOOGLE_PAY = 'google-pay';
    case APPLE_PAY = 'apple-pay';
}
