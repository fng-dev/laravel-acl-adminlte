<?php

namespace App\Providers;

use App\Model\Permission;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        /************************************************************************
         * LOGICA PARA FAZER USO DE ACL
         *
         * RESGATANDO AS PERMISSOES(ABILITIES) POSSIVEIS NO SISTEMA
         ***********************************************************************/

        $permissions = Permission::with('roles')->get();

        foreach ($permissions as $permission){
            Gate::define($permission->name, function () use ($permission){
                $roles = auth()->user()->roles;
                return auth()->user()->hasPermission($permission, $roles);
            });
        }

        Gate::before(function ($user, $ability){
           return $user->isAdmin('admin');
        });


    }
}
