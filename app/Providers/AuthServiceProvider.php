<?php

namespace App\Providers;


use App\constants\Permissions;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        foreach (Permissions::all() as $name => $desc) {
            Gate::define($name, function (User $user) use ($name) {
                if ($user->role == null) {
                    return true;
                }

                if ($user->role->permissions->pluck('name')->contains($name)) {
                    return true;
                }

                return false;
            });
        }
    }
}
