<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        \Gate::define('options-questions', function($uesr, $quesiton){
            return $uesr->id == $quesiton->user_id;
        });

        \Gate::define('delete-questions', function($user, $quesiton){
            return $user->id == $quesiton->user_id;
        });
        
        $this->registerPolicies();

        //
    }
}
