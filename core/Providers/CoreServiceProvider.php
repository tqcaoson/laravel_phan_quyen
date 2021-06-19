<?php

namespace Core\Providers;

use Core\Services\User\UserService;
use Core\Services\User\UserServiceContract;
use Core\Repositories\User\UserRepository;
use Core\Repositories\User\UserRepositoryContract;

use Core\Services\Role\RoleService;
use Core\Services\Role\RoleServiceContract;
use Core\Repositories\Role\RoleRepository;
use Core\Repositories\Role\RoleRepositoryContract;

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
        $this->app->singleton(UserRepositoryContract::class, UserRepository::class);
        $this->app->singleton(UserServiceContract::class, UserService::class);

        $this->app->singleton(RoleRepositoryContract::class, RoleRepository::class);
        $this->app->singleton(RoleServiceContract::class, RoleService::class);

        $this->app->singleton(PermissionRepositoryContract::class, PermissionRepository::class);
        $this->app->singleton(PermissionServiceContract::class, PermissionService::class);

        $this->app->singleton(ProductRepositoryContract::class, ProductRepository::class);
        $this->app->singleton(ProductServiceContract::class, ProductService::class);
    }
}