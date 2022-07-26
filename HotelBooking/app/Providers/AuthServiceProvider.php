<?php

namespace App\Providers;

use App\Models\Customers;
use App\Models\RoomType;
use App\Models\UserGroup;
use App\Policies\CustomersPolicy;
use App\Policies\RoomTypePolicy;
use App\Policies\UserGroupPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        RoomType::class => RoomTypePolicy::class,
        UserGroup::class => UserGroupPolicy::class,
        Customers::class => CustomersPolicy::class
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
