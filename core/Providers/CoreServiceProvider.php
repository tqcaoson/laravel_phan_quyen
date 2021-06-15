<?php

namespace Core\Providers;

// use Core\Services\UserService;
// use Core\Repositories\UserRepository;

// use Core\Services\RoleService;
// use Core\Repositories\RoleRepository;

use Core\Services\Permission\PermissionService;
use Core\Services\Permission\PermissionServiceContract;
use Core\Repositories\Permission\PermissionRepository;
use Core\Repositories\Permission\PermissionRepositoryContract;

use Core\Services\Product\ProductService;
use Core\Services\Product\ProductServiceContract;
use Core\Repositories\Product\ProductRepository;
use Core\Repositories\Product\ProductRepositoryContract;


use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        // $this->app->bind(UserServiceContract::class, UserService::class);

        // $this->app->bind(RoleRepositoryContract::class, RoleRepository::class);
        // $this->app->bind(RoleServiceContract::class, RoleService::class);

        $this->app->bind(PermissionRepositoryContract::class, PermissionRepository::class);
        $this->app->bind(PermissionServiceContract::class, PermissionService::class);

        $this->app->bind(ProductRepositoryContract::class, ProductRepository::class);
        $this->app->bind(ProductServiceContract::class, ProductService::class);
    }
}