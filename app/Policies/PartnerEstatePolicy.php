<?php

namespace App\Policies;

use App\Models\PartnerEstate;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PartnerEstatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view partner estate');
    }
}
