<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Masterminds\HTML5\Parser\TreeBuildingRules;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get all of the supplyEstates for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function supplyEstates(): HasMany
    {
        return $this->hasMany(SupplyEstates::class);
    }

    /**
     * Get all of the estats for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function estates(): HasMany
    {
        return $this->hasMany(Estate::class);
    }

    /**
     * Get all of the ownerEsates for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ownerEsates(): HasMany
    {
        return $this->hasMany(OwnerEstate::class);
    }


    /**
     * Get all of the partnerEstates for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function partnerEstates(): HasMany
    {
        return $this->hasMany(PartnerEstate::class);
    }


    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole(['Admin', 'Owner', 'Broker']);
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }
}
