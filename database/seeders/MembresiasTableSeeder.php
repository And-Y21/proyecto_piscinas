<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Membresia;

class MembresiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::inRandomOrder()->take(10)->wherenot('rol', 'Admin')->get();

        foreach ($usuarios as $usuario) {
            Membresia::create([
                'id_usuario' => $usuario->id,
                'clases_adquiridas' => 20,
                'clases_disponibles' => rand(5, 15),
                'clases_ocupadas' => rand(5, 15)
            ]);
        }
    }
}
