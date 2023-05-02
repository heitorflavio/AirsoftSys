<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Blade::if('hasPermission', function ($permission) {
            // Substitua esta linha pela lógica de verificação de permissão adequada
            // Por exemplo, se você estiver usando o pacote Spatie Permission
            // return auth()->check() && auth()->user()->hasPermissionTo($permission);
            
            return auth()->check() && auth()->user()->permission == $permission;
        });
    }
}
