<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\GrupoLaboratorioObserver;
use App\Models\GrupoLaboratorio;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        GrupoLaboratorio::observe(GrupoLaboratorioObserver::class);
    }
}
