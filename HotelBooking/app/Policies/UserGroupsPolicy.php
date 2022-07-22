<?php

namespace App\Policies;

use App\Models\User;
use App\Models\user_groups;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserGroupsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasPermission('UserGroup_viewAny');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\user_groups  $userGroups
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, user_groups $userGroups)
    {
        return $user->hasPermission('UserGroup_view');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermission('UserGroup_create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\user_groups  $userGroups
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, user_groups $userGroup)
    {
        return $user->hasPermission('UserGroup_update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, user_groups $userGroup)
    {
        return $user->hasPermission('UserGroup_delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, user_groups $userGroup)
    {
        return $user->hasPermission('UserGroup_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UserGroup  $userGroup
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, user_groups $userGroup)
    {
        return $user->hasPermission('UserGroup_forceDelete');
    }
}
