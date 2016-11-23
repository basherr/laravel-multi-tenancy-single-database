<?php

namespace App\Policies;

use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class UserProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Check if user can create a new project
     *
     * @param null
     * @return null
     */
    public function edit(User $user, array $roles)
    {
        if(in_array($user->role_id, $roles)) {
            return true;
        }
    }
    /**
     * Check if user can create a new project
     *
     * @param null
     * @return null
     */
    public function store(User $user, array $roles)
    {
        if(in_array($user->role_id, $roles)) {
            return true;
        }
    }
    /**
     * Check if user can create a new project
     *
     * @param null
     * @return null
     */
    public function update(User $user, $roles)
    {
        if(in_array($user->role_id, $roles)) {
            return true;
        }
    }
}
