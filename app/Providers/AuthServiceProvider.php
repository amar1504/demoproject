<?php

namespace App\Providers;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        GateContract::define('isSuperAdmin',function($user){
            return $user->userRole->role_name=='superadmin';
        });


        GateContract::define('isAdmin',function($user){
            return $user->userRole->role_name=='admin';
        });
        
        GateContract::define('isInventoryManager',function($user){
            return $user->userRole->role_name=='inventory manager';
        });


        GateContract::define('isOrderManager',function($user){
            return $user->userRole->role_name=='order manager';
        });
        
        GateContract::define('isCustomer',function($user){
            return $user->userRole->role_name=='customer';
        });


    }
}
