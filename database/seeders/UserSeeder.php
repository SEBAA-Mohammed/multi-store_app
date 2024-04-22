<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Test Admin 1',
            'adresse' => 'adresse example ...',
            'ville' => 'fes',
            'tel' => '+212 762 416 046',
            'username' => 'test1',
            'role' => Role::ADMIN,
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1234')
        ]);

        User::create([
            'name' => 'Test Admin 2',
            'adresse' => 'adresse example ...',
            'ville' => 'fes',
            'tel' => '+212 762 416 046',
            'username' => 'test2',
            'role' => Role::ADMIN,
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('admin1234')
        ]);

        User::create([
            'name' => 'Manager',
            'adresse' => 'adresse example ...',
            'ville' => 'fes',
            'tel' => '+212 762 416 046',
            'username' => 'manager',
            'role' => Role::MANAGER,
            'email' => 'manager@gmail.com',
            'password' => Hash::make('manager1234')
        ]);
    }
}
