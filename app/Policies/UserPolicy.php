<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isManager();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $loggedInUser, User $targetUser): bool
    {
        if ($loggedInUser->isManager()) {
            return $loggedInUser->organization_id === $targetUser->organization_id;
        }
        return $loggedInUser->id === $targetUser->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isManager();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $loggedInUser, User $targetUser): bool
    {
        if ($loggedInUser->isManager()) {
            return $loggedInUser->organization_id === $targetUser->organization_id;
        }

        return $loggedInUser->id === $targetUser->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $loggedInUser, User $targetUser): bool
    {
        return $loggedInUser->isManager()
            && $loggedInUser->organization_id === $targetUser->organization_id
            && $loggedInUser->id !== $targetUser->id;
    }
    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return false;
    }
}
