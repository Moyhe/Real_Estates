<?php

namespace App\Providers;

use App\Models\EstateMarket;
use App\Models\SupplyEstates;
use App\Models\User;
use App\Policies\EstateMarketPolicy;
use App\Policies\SupplyEstatesPolicy;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        SupplyEstates::class => SupplyEstatesPolicy::class,
        User::class => UserFactory::class,
        EstateMarket::class => EstateMarketPolicy::class
    ];


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function ($user, $ability) {
            return $user->hasRole('Admin') ? true : null;
        });

        Model::unguard();
    }
}
