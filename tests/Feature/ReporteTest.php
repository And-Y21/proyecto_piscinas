<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class ReporteTest extends TestCase
{
    use RefreshDatabase;

    public function test_generar_reporte_uso()
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/reportes/generar', [
            'fecha_inicio' => '2023-01-01',
            'fecha_fin' => '2023-01-31',
        ]);

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
    }
}
