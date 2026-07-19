<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_usuario_puede_iniciar_sesion_con_credenciales_correctas(): void
    {
        $user = User::factory()->create(['password' => bcrypt('secreto123')]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'secreto123',
        ]);

        $response->assertOk()
            ->assertJsonStructure(['token', 'user' => ['id', 'name', 'email']]);
    }

    public function test_login_falla_con_credenciales_incorrectas(): void
    {
        User::factory()->create(['email' => 'test@test.com', 'password' => bcrypt('correcta')]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@test.com',
            'password' => 'incorrecta',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    }

    public function test_login_requiere_email_y_password(): void
    {
        $response = $this->postJson('/api/login', []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['email', 'password']);
    }

    public function test_usuario_puede_cerrar_sesion(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('api-token')->plainTextToken;

        $response = $this->withToken($token)->postJson('/api/logout');

        $response->assertOk()
            ->assertJsonFragment(['message' => 'Sesión cerrada correctamente.']);
    }

    public function test_rutas_protegidas_requieren_autenticacion(): void
    {
        $this->getJson('/api/direcciones')->assertUnauthorized();
        $this->getJson('/api/carreras')->assertUnauthorized();
        $this->getJson('/api/laboratorios')->assertUnauthorized();
    }
}
