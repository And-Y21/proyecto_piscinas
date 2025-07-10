<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Membresia;
use App\Models\Clase;
use App\Models\Pago;

class PagosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = User::all();

        foreach ($usuarios as $usuario) {
            Pago::create([
                'id_usuario' => $usuario->id,
                'id_membresia' => Membresia::where('id_usuario', $usuario->id)->first()->id ?? null,
                'id_clase' => Clase::inRandomOrder()->first()->id ?? null,
                'monto' => fake()->randomFloat(2, 5, 100),
                'fecha' => now()->subDays(rand(1, 30)),
            ]);
        }
    }
}
