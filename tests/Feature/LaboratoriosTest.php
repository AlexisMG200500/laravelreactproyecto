<?php

namespace Tests\Feature;

use App\Models\Laboratorio;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LaboratoriosTest extends TestCase
{
    use RefreshDatabase;

    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    private function actuando(): static
    {
        return $this->actingAs($this->user, 'sanctum');
    }

    public function test_lista_laboratorios(): void
    {
        Laboratorio::factory()->count(2)->create();

        $this->actuando()->getJson('/api/laboratorios')
            ->assertOk()
            ->assertJsonCount(2, 'data');
    }

    public function test_crea_laboratorio(): void
    {
        $response = $this->actuando()->postJson('/api/laboratorios', [
            'laboratorio' => 'Laboratorio de Química',
            'abreviatura' => 'LAQ',
            'estatus' => 'Activo',
        ]);

        $response->assertCreated()
            ->assertJsonFragment(['laboratorio' => 'Laboratorio de Química']);
    }

    public function test_crear_laboratorio_falla_con_nombre_corto(): void
    {
        $this->actuando()->postJson('/api/laboratorios', [
            'laboratorio' => 'Lab',
            'abreviatura' => 'LAB',
            'estatus' => 'Activo',
        ])->assertUnprocessable()->assertJsonValidationErrors(['laboratorio']);
    }

    public function test_muestra_laboratorio(): void
    {
        $laboratorio = Laboratorio::factory()->create();

        $this->actuando()->getJson("/api/laboratorios/{$laboratorio->id}")
            ->assertOk()
            ->assertJsonFragment(['id' => $laboratorio->id]);
    }

    public function test_show_laboratorio_404(): void
    {
        $this->actuando()->getJson('/api/laboratorios/9999')->assertNotFound();
    }

    public function test_actualiza_laboratorio(): void
    {
        $laboratorio = Laboratorio::factory()->create();

        $this->actuando()->putJson("/api/laboratorios/{$laboratorio->id}", [
            'laboratorio' => 'Laboratorio actualizado',
            'abreviatura' => 'UPD',
            'estatus' => 'Inactivo',
        ])->assertOk()->assertJsonFragment(['estatus' => 'Inactivo']);
    }

    public function test_elimina_laboratorio(): void
    {
        $laboratorio = Laboratorio::factory()->create();

        $this->actuando()->deleteJson("/api/laboratorios/{$laboratorio->id}")->assertOk();

        $this->assertDatabaseMissing('laboratorios', ['id' => $laboratorio->id]);
    }
}
