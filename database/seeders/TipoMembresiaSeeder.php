<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoMembresia;

class TipoMembresiaSeeder extends Seeder
{
    public function run()
    {
        TipoMembresia::insert([
            ['nombre' => 'Básica', 'clases_adquiridas' => 5],
            ['nombre' => 'Estándar', 'clases_adquiridas' => 10],
            ['nombre' => 'Premium', 'clases_adquiridas' => 20],
        ]);
    }
}
