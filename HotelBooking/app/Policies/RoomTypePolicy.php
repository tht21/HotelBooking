<?php

namespace App\Policies;

use App\Models\RoomType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoomTypePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('RoomType_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\RoomType $roomType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RoomType $roomType)
    {
        return $user->hasPermission('RoomType_view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('RoomType_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\RoomType $roomType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RoomType $roomType)
    {
        return $user->hasPermission('RoomType_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\RoomType $roomType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RoomType $roomType)
    {
        return $user->hasPermission('RoomType_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\RoomType $roomType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RoomType $roomType)
    {
        return $user->hasPermission('RoomType_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\RoomType $roomType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RoomType $roomType)
    {
        return $user->hasPermission('RoomType_forceDelete');
    }
}
