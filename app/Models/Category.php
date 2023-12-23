<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;


    /**
     * Get all of the estateTypes for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estateTypes(): HasMany
    {
        return $this->hasMany(SupplyEstates::class);
    }

    /**
     * Get all of the partnerEstates for the OrderType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partnerEstates(): HasMany
    {
        return $this->hasMany(PartnerEstate::class);
    }

    /**
     * Get all of the ownerEstates for the Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownerEstates(): HasMany
    {
        return $this->hasMany(OwnerEstate::class);
    }
}
