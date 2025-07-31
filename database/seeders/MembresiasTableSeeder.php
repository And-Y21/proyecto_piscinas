<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Membresia;
use App\Models\TipoMembresia;

class MembresiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = TipoMembresia::all();
        $usuarios = User::where('rol', 'Cliente')->get();

        foreach ($usuarios as $usuario) {
            $tipo = $tipos->random();

            Membresia::create([
                'id_usuario' => $usuario->id,
                'id_tipo_membresia' => $tipo->id,
                'clases_disponibles' => $tipo->clases_adquiridas,
                'clases_ocupadas' => 0,
            ]);
        }
    }
}
