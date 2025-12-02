<?php

namespace App\Observers;
use App\Models\GrupoLaboratorio;

class GrupoLaboratorioObserver
{
      public function saving(GrupoLaboratorio $grupoLaboratorio)
{
    if (is_array($grupoLaboratorio->dias_asignados)) {
        $grupoLaboratorio->dias_asignados = implode(',', array_map('trim', $grupoLaboratorio->dias_asignados));
    }
}
}
