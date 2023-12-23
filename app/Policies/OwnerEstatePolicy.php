<?php

namespace App\Policies;

use App\Models\OwnerEstate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OwnerEstatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view owner estate');
    }
}
