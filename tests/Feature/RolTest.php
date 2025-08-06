<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class RolTest extends TestCase
{
    use RefreshDatabase;

    public function test_asignar_rol_a_usuario()
    {
        $admin = User::factory()->create(['is_admin' => true]);
        $usuario = User::factory()->create();

        $response = $this->actingAs($admin)->post("/usuarios/{$usuario->id}/rol", [
            'rol' => 'moderador'
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('users', [
            'id' => $usuario->id,
            'rol' => 'moderador'
        ]);
    }
}
