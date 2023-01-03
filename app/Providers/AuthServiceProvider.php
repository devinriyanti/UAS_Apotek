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
        $this->registerPolicies();

        Gate::define('pegawai-permission','App\Policies\PegawaiPolicy@access');
        Gate::define('pembeli-permission','App\Policies\PembeliPolicy@access');
        Gate::define('pemilik-permission','App\Policies\PemilikPolicy@access');
    }
}
