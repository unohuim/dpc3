<?php

namespace App\Providers;

use App\Leads\Source;
use App\Policies\LeadsSourcePolicy;
use App\Leads\SourceType;
use App\Policies\LeadsSourceTypePolicy;


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
        
        Source::class => LeadsSourcePolicy::class,

        SourceType::class => LeadsSourceTypePolicy::class
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
    }
}
