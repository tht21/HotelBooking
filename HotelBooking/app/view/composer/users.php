<?php

namespace App\View\Composer;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class Users
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $profile_users;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $this->profile_users = Auth::user();
        

    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('profile_user', $this->profile_users);
    }
}