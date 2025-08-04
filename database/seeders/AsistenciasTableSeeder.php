<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Clase;
use App\Models\User;
use App\Models\Membresia;
use App\Models\Asistencia;

class AsistenciasTableSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = User::where('rol', 'Cliente')->get();
        $clases = Clase::all();

        echo "Total clientes: {$clientes->count()}, clases: {$clases->count()}\n";

        foreach ($clientes as $usuario) {
            $clasesAleatorias = $clases->random(rand(1, 2));

            foreach ($clasesAleatorias as $clase) {
                $membresia = Membresia::where('id_usuario', $usuario->id)->first();

                try {
                    $asistencia = Asistencia::create([
                        'id_clase' => $clase->id,
                        'id_usuario' => $usuario->id,
                        'id_profesor' => $clase->id_profesor,
                        'id_membresia' => $membresia?->id,
                    ]);
                    echo "✓ Asistencia creada para usuario {$usuario->id}, clase {$clase->id}\n";
                } catch (\Exception $e) {
                    echo "✗ Error: " . $e->getMessage() . "\n";
                }
            }
        }
    }
}
