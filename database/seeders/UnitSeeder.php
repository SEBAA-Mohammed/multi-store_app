<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $units = [' ', 'kg', 'L', 'km', 'm', 'cm', 'mm', 'g', 'sqm', '5gallon bottle', 'gallon', '20 kg pack', '10 kg pack', '30 kg pack', '5 kg pack'];

        foreach ($units as $unit) {
            DB::table('units')->insert([
                'name' => $unit,
                'store_id' => Store::inRandomOrder()->first()->id
            ]);
        }
    }
}
