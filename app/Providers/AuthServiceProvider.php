<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /* Passport::routes();
        
        Passport::personalAccessTokensExpireIn(now()->addMinutes(15));

        Passport::tokensCan([
            'altaProducto' => 'Agregar un producto',
            'updateProducto' => 'Actualizar un producto',
            'bajaProducto' => 'Dar de baja un producto',
            'ABMRoles' => 'Alta baja y modificiacion Roles',
            'ABMPermisos' => 'Alta baja y modificiacion Permisos',
        ]); */
    }
}
