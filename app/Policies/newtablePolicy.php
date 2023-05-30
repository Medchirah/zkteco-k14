<?php

namespace App\Policies;

use App\Models\User;
use App\Models\newtable;
use Illuminate\Auth\Access\Response;

class newtablePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('Repport');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, newtable $newtable)
    {
        return $user->hasRole('Repport');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, newtable $newtable): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, newtable $newtable)
    {
        return $user->hasRole('Repport');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, newtable $newtable): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, newtable $newtable): bool
    {
        //
    }
}
