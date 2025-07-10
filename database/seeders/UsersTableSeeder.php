<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2 administradores
        User::create([
            'name' => 'Andy',
            'email' => 'andy@gmail.com',
            'password' => '12345678',
            'rol' => 'Admin'
        ]);

        User::create([
            'name' => 'Andy2',
            'email' => 'andy2@gmail.com',
            'password' => '12345678',
            'rol' => 'Admin'
        ]);

        // 5 profesores
        User::factory(5)->create([
            'rol' => 'Instructor'
        ]);

        // 30 clientes
        User::factory(30)->create([
            'rol' => 'Cliente'
        ]);

    }
}
