<?php

namespace Tests\Feature;

use App\Models\Direccion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DireccionesTest extends TestCase
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

    // --- index ---

    public function test_lista_direcciones_paginadas(): void
    {
        Direccion::factory()->count(3)->create();

        $response = $this->actuando()->getJson('/api/direcciones');

        $response->assertOk()
            ->assertJsonStructure(['data', 'meta', 'links'])
            ->assertJsonCount(3, 'data');
    }

    public function test_lista_vacia_cuando_no_hay_direcciones(): void
    {
        $response = $this->actuando()->getJson('/api/direcciones');

        $response->assertOk()->assertJsonCount(0, 'data');
    }

    // --- store ---

    public function test_crea_direccion_con_datos_validos(): void
    {
        $data = [
            'direccion' => 'Tecnologías de la Información',
            'abreviatura' => 'TIC',
            'estatus' => 'Activo',
        ];

        $response = $this->actuando()->postJson('/api/direcciones', $data);

        $response->assertCreated()
            ->assertJsonFragment(['direccion' => 'Tecnologías de la Información']);

        $this->assertDatabaseHas('direcciones', ['abreviatura' => 'TIC']);
    }

    public function test_crear_direccion_falla_con_datos_invalidos(): void
    {
        $response = $this->actuando()->postJson('/api/direcciones', [
            'direccion' => 'Cor',
            'abreviatura' => '',
            'estatus' => 'Invalido',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['direccion', 'abreviatura', 'estatus']);
    }

    public function test_no_permite_abreviatura_duplicada(): void
    {
        Direccion::factory()->create(['abreviatura' => 'TIC']);

        $response = $this->actuando()->postJson('/api/direcciones', [
            'direccion' => 'Otra dirección válida',
            'abreviatura' => 'TIC',
            'estatus' => 'Activo',
        ]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['abreviatura']);
    }

    // --- show ---

    public function test_muestra_direccion_existente(): void
    {
        $direccion = Direccion::factory()->create();

        $response = $this->actuando()->getJson("/api/direcciones/{$direccion->id}");

        $response->assertOk()
            ->assertJsonFragment(['id' => $direccion->id]);
    }

    public function test_show_retorna_404_si_no_existe(): void
    {
        $this->actuando()->getJson('/api/direcciones/9999')->assertNotFound();
    }

    // --- update ---

    public function test_actualiza_direccion_existente(): void
    {
        $direccion = Direccion::factory()->create();

        $response = $this->actuando()->putJson("/api/direcciones/{$direccion->id}", [
            'direccion' => 'Nombre actualizado correctamente',
            'abreviatura' => 'UPD',
            'estatus' => 'Inactivo',
        ]);

        $response->assertOk()
            ->assertJsonFragment(['abreviatura' => 'UPD']);

        $this->assertDatabaseHas('direcciones', ['id' => $direccion->id, 'estatus' => 'Inactivo']);
    }

    public function test_actualizar_permite_misma_abreviatura_del_propio_registro(): void
    {
        $direccion = Direccion::factory()->create(['abreviatura' => 'TIC']);

        $response = $this->actuando()->putJson("/api/direcciones/{$direccion->id}", [
            'direccion' => 'Tecnologías de la Información',
            'abreviatura' => 'TIC',
            'estatus' => 'Activo',
        ]);

        $response->assertOk();
    }

    public function test_update_retorna_404_si_no_existe(): void
    {
        $this->actuando()->putJson('/api/direcciones/9999', [
            'direccion' => 'No importa el valor',
            'abreviatura' => 'XXX',
            'estatus' => 'Activo',
        ])->assertNotFound();
    }

    // --- destroy ---

    public function test_elimina_direccion_existente(): void
    {
        $direccion = Direccion::factory()->create();

        $response = $this->actuando()->deleteJson("/api/direcciones/{$direccion->id}");

        $response->assertOk();
        $this->assertDatabaseMissing('direcciones', ['id' => $direccion->id]);
    }

    public function test_destroy_retorna_404_si_no_existe(): void
    {
        $this->actuando()->deleteJson('/api/direcciones/9999')->assertNotFound();
    }
}
