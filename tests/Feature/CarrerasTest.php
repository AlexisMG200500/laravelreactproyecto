<?php

namespace Tests\Feature;

use App\Models\Carrera;
use App\Models\Direccion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarrerasTest extends TestCase
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

    public function test_lista_carreras_paginadas(): void
    {
        Carrera::factory()->count(3)->create();

        $this->actuando()->getJson('/api/carreras')
            ->assertOk()
            ->assertJsonCount(3, 'data');
    }

    public function test_crea_carrera_con_datos_validos(): void
    {
        $direccion = Direccion::factory()->create();

        $response = $this->actuando()->postJson('/api/carreras', [
            'direccion_id' => $direccion->id,
            'carrera' => 'Ingeniería en Sistemas',
            'abreviatura' => 'ISC',
            'estatus' => 'Activo',
        ]);

        $response->assertCreated()
            ->assertJsonFragment(['carrera' => 'Ingeniería en Sistemas']);

        $this->assertDatabaseHas('carreras', ['abreviatura' => 'ISC']);
    }

    public function test_crear_carrera_falla_si_direccion_no_existe(): void
    {
        $response = $this->actuando()->postJson('/api/carreras', [
            'direccion_id' => 9999,
            'carrera' => 'Carrera de prueba',
            'abreviatura' => 'CPR',
            'estatus' => 'Activo',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['direccion_id']);
    }

    public function test_muestra_carrera_con_su_direccion(): void
    {
        $carrera = Carrera::factory()->create();

        $response = $this->actuando()->getJson("/api/carreras/{$carrera->id}");

        $response->assertOk()
            ->assertJsonStructure(['data' => ['id', 'carrera', 'direccion_id', 'direccion']]);
    }

    public function test_show_carrera_retorna_404_si_no_existe(): void
    {
        $this->actuando()->getJson('/api/carreras/9999')->assertNotFound();
    }

    public function test_actualiza_carrera(): void
    {
        $carrera = Carrera::factory()->create();

        $response = $this->actuando()->putJson("/api/carreras/{$carrera->id}", [
            'direccion_id' => $carrera->direccion_id,
            'carrera' => 'Nombre actualizado correctamente',
            'abreviatura' => 'UPD',
            'estatus' => 'Inactivo',
        ]);

        $response->assertOk()
            ->assertJsonFragment(['abreviatura' => 'UPD']);
    }

    public function test_elimina_carrera(): void
    {
        $carrera = Carrera::factory()->create();

        $this->actuando()->deleteJson("/api/carreras/{$carrera->id}")
            ->assertOk();

        $this->assertDatabaseMissing('carreras', ['id' => $carrera->id]);
    }
}
