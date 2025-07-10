<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Clase;

class ClasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesores = User::inRandomOrder()->take(5)->where('rol', 'Instructor')->get();

        foreach (range(1, 20) as $i) {
            $profesor = $profesores->random();
            $lugares = rand(10, 30);
            $ocupados = rand(0, $lugares);

            Clase::create([
                'fecha' => now()->addDays(rand(1, 30)),
                'id_profesor' => $profesor->id,
                'tipo' => fake()->randomElement(['Infantil', 'Adultos', 'Avanzado']),
                'lugares' => $lugares,
                'lugares_ocupados' => $ocupados,
                'lugares_disponibles' => $lugares - $ocupados
            ]);
        }
    }
}
