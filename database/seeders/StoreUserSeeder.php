<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $stores = Store::all();

        foreach ($users as $user) {
            $userStores = $stores->splice(0, 2);
            $user->stores()->attach($userStores->pluck('id'));
        }
    }
}
