<?php

namespace App\Providers;


use App\Repositories\Eloquent\BookingRoomRepository;
use App\Repositories\Eloquent\CustomerRepository;
use App\Repositories\Eloquent\EloquentRepository;
use App\Repositories\Eloquent\FloorRepository;
use App\Repositories\Eloquent\RoomRepository;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\BookingRoomInterface;
use App\Repositories\Interfaces\FloorInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Interfaces\RoomInterface;
use App\Repositories\Interfaces\UserInterface;
use App\Services\BookingRoomService;
use App\Services\FloorService;

use App\Services\Interfaces\BookingRoomServiceInterface;
use App\Services\Interfaces\FloorServiceInterface;
use App\Services\Interfaces\RoomServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\RoomService;

use App\Repositories\Eloquent\RoomTyperepository;
use App\Repositories\Eloquent\UserGroupRepository;
use App\Repositories\Interfaces\CustomerInterface;
use App\Repositories\Interfaces\RoomTypeRepositoryInterface;
use App\Repositories\Interfaces\UserGroupInterface;
use App\Services\CustomerService;
use App\Services\Interfaces\CustomerServiceInterface;

use App\Services\Interfaces\RoomTypeServiceInterface;
use App\Services\Interfaces\UserGroupServiceInterface;
use App\Services\RoomTypeService;
use App\Services\UserGroupService;
use App\Services\UserService;
use App\View\Composer\Users;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;

class  AppServiceProvider extends ServiceProvider
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
        $this->app->singleton(RoomServiceInterface::class, RoomService::class);

        //rooms
        $this->app->singleton(FloorInterface::class, FloorRepository::class);
        $this->app->singleton(FloorServiceInterface::class, FloorService::class);

        //room_type
        $this->app->singleton(RepositoryInterface::class, EloquentRepository::class);
        $this->app->singleton(RoomTypeRepositoryInterface::class, RoomTyperepository::class);
        $this->app->singleton(RoomTypeServiceInterface::class, RoomTypeService::class);

        //customers
        $this->app->singleton(CustomerServiceInterface::class, CustomerService::class);
        $this->app->singleton(CustomerInterface::class, CustomerRepository::class);

        //booking room
        $this->app->singleton(BookingRoomServiceInterface::class, BookingRoomService::class);
        $this->app->singleton(BookingRoomInterface::class, BookingRoomRepository::class);


        //userGroup
        $this->app->singleton(UserGroupServiceInterface::class, UserGroupService::class);
        $this->app->singleton(UserGroupInterface::class, UserGroupRepository::class);

        //user
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(UserInterface::class, UserRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer(
            ['*'],
            Users::class
        );
    }
}
