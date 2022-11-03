<?php

namespace Corals\Modules\Utility\ListOfValue\Providers;

use Corals\Modules\Utility\ListOfValue\Models\ListOfValue;
use Corals\Modules\Utility\ListOfValue\Policies\ListOfValuePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class UtilityAuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        ListOfValue::class => ListOfValuePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
