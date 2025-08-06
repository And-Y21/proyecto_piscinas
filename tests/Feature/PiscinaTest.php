<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Piscina;
use App\Models\User;

class PiscinaTest extends TestCase
{
    use RefreshDatabase;

    public function test_crear_piscina()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/piscinas', [
            'nombre' => 'Piscina Olímpica',
            'ubicacion' => 'CDMX',
            'capacidad' => 100,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('piscinas', ['nombre' => 'Piscina Olímpica']);
    }

    public function test_actualizar_piscina()
    {
        $user = User::factory()->create();
        $piscina = Piscina::factory()->create();

        $response = $this->actingAs($user)->put("/piscinas/{$piscina->id}", [
            'nombre' => 'Piscina Actualizada',
            'ubicacion' => 'Nuevo Lugar',
            'capacidad' => 150,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('piscinas', ['nombre' => 'Piscina Actualizada']);
    }
}
