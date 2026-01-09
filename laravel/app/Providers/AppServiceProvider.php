<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Category;
use App\Policies\CategoryPolicy;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Admin can do everything
        Gate::before(function ($user, $ability) {
            return $user->hasRole('admin') ? true : null;
        });

        // REGISTER POLICY (IMPORTANT)
        Gate::policy(Category::class, CategoryPolicy::class);

        // Permission-based Gates
        Gate::define('users.manage', fn ($user) => $user->hasPermission('users.manage'));
        Gate::define('products.create', fn ($user) => $user->hasPermission('products.create'));
        Gate::define('products.update', fn ($user) => $user->hasPermission('products.update'));
        Gate::define('categories.create', fn ($user) => $user->hasPermission('categories.create'));
        Gate::define('categories.update', fn ($user) => $user->hasPermission('categories.update'));
    }
}
