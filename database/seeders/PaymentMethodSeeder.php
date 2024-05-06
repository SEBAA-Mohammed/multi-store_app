<?php

namespace Database\Seeders;

use App\Enums\PaymentMethod as PaymentType;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::insert([
            [
                'name' => PaymentType::NONE,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => PaymentType::CARD,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => PaymentType::PAYPAL,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => PaymentType::WIRE_TRANSFER,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => PaymentType::GOOGLE_PAY,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => PaymentType::APPLE_PAY,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
