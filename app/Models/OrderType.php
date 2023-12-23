<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderType extends Model
{
    use HasFactory;

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
     * Get all of the searchEstates for the OrderType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function searchEstates(): HasMany
    {
        return $this->hasMany(SearchEstate::class);
    }

    /**
     * Get all of the estates for the OrderType
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estates(): HasMany
    {
        return $this->hasMany(Estate::class);
    }
}
