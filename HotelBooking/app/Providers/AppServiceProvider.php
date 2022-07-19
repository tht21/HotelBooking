<?php

namespace App\Providers;


use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\FloorRepository;
use App\Repositories\Eloquent\RoomRepository;
use App\Repositories\Interfaces\FloorInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Interfaces\RoomInterface;
use App\Services\FloorService;
use App\Services\Interfaces\FloorServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\RoomService;

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
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
        //CourseInterface - RoomRepository
        $this->app->singleton(RoomInterface::class, RoomRepository::class);
        /* Binding  Service*/
        $this->app->singleton(RoomServiceInterface::class, RoomService::class);
        $this->app->singleton(FloorInterface::class, FloorRepository::class);
        /* Binding  Service*/
        $this->app->singleton(FloorServiceInterface::class, FloorService::class);

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
