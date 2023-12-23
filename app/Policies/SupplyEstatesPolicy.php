<?php

namespace App\Policies;

use App\Models\User;

class SupplyEstatesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view estate');
    }
}
