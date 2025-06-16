<?php

namespace App\Providers;

use App\View\Components\MascotasInput;
use App\View\Components\MascotasUpdate;
use App\View\Components\InputDatos;
use App\View\Components\SolicitudesInput;
use App\View\Components\SolicitudesUpdate;
use App\View\Components\UpdateDatos;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force HTTPS in production environment
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
            // Trust all proxies for Vercel deployment
            Request::setTrustedProxies(['*'], Request::HEADER_X_FORWARDED_FOR | Request::HEADER_X_FORWARDED_HOST | Request::HEADER_X_FORWARDED_PORT | Request::HEADER_X_FORWARDED_PROTO);
        }
        
        // Soluciona el problema "Specified key was too long" en versiones antiguas de MySQL
        Schema::defaultStringLength(191);
        
        Paginator::useBootstrap();
        Blade::component('mascotas-input', MascotasInput::class);
        Blade::component('mascotas-update', MascotasUpdate::class);
        Blade::component('input-datos', InputDatos::class);
        Blade::component('update-datos', UpdateDatos::class);
        Blade::component('solicitudes-input', SolicitudesInput::class);
        Blade::component('solicitudes-update', SolicitudesUpdate::class);
    }
}
