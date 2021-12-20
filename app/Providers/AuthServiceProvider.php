<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
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

        Gate::define('manage-users', function (User $user) {
            return $user->hasAnyRole(['admin', 'author']);
        });

        Gate::define('edit-user', function (User $user) {
            return $user->hasAnyRole(['admin', 'author']);
        });

        Gate::define('delete-user', function (User $user) {
            return $user->isAdmin();
        });
    }
}
