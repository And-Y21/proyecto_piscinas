<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Clase;
use App\Models\Asistencia;
use App\Models\Membresia;

class AsistenciasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes = User::where('rol', 'cliente')->get();
        $clases = Clase::all();

        foreach ($clientes as $usuario) {
            // Le asignamos entre 1 y 3 clases aleatorias
            $clasesAleatorias = $clases->random(rand(1, 3));

            foreach ($clasesAleatorias as $clase) {
                // Buscar membresía del cliente
                $membresia = Membresia::where('id_usuario', $usuario->id)->first();

                // Solo creamos la asistencia si tiene membresía y la clase tiene profesor
                if ($membresia && $clase->id_profesor) {
                    Asistencia::create([
                        'id_clase' => $clase->id,
                        'id_usuario' => $usuario->id,
                        'id_profesor' => $clase->id_profesor,
                        'id_membresia' => $membresia->id,
                    ]);
                }
            }
        }
    }
}
