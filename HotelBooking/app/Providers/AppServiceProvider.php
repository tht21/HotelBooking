<?php

namespace App\Providers;

use App\Interface\Repositories\RepositoryInterface;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\RoomTyperepository;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use App\Services\Interfaces\RoomTypeServiceInterface;
use App\Services\RoomTypeService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //room_type
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
        $this->app->singleton(RoomTypeRepositoryInterface::class, RoomTyperepository::class);
        $this->app->singleton(RoomTypeServiceInterface::class, RoomTypeService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
    }
}
