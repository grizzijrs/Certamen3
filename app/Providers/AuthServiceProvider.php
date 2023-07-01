<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        gate::define("admin", function($cuenta){
            return $cuenta->perfil_id==1; 
        });
        gate::define("artista", function($cuenta){
            return $cuenta->perfil_id==2|1; 
        });
        gate::define("artista-perfil", function($cuenta){
            return $cuenta->perfil_id==2; 
        });
        gate::define("inicio-crear", function($cuenta){
            return Auth::check();
        }); 
        gate::define("baneado", function($imagen){
            return $imagen->baneada == 1;
        }); 
    }
}
