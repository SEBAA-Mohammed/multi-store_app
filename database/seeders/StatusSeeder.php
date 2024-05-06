<?php

namespace Database\Seeders;

use App\Enums\OrderStatus;
use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::insert([
            [
                'name' => OrderStatus::PROCESSING,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => OrderStatus::SHIPPED,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => OrderStatus::DELIVERED,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => OrderStatus::CANCELLED,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => OrderStatus::COMPLETED,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
