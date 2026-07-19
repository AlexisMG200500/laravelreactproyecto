<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleFormatoLaboratorio extends Model
{
    public $timestamps = false;

    protected $table = 'detalle_formato_laboratorio';

    protected $fillable = [
        'formato_laboratorio_id',
        'material_id',
        'unidad_medida_id',
        'cantidad',
    ];

    public function formatoLaboratorio(): BelongsTo
    {
        return $this->belongsTo(FormatoLaboratorio::class, 'formato_laboratorio_id');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class, 'material_id');
    }

    public function unidadMedida(): BelongsTo
    {
        return $this->belongsTo(UnidadMedida::class, 'unidad_medida_id');
    }
}
