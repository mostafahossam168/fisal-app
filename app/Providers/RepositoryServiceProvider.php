<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Interfaces\UserInterface;
use App\Repositories\AdminRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\Productrepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(ProductInterface::class, Productrepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
