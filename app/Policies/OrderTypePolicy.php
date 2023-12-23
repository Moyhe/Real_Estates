<?php

namespace App\Policies;

use App\Models\OrderType;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OrderTypePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view estate');
    }
}
