<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $adminUser = User::factory()->create([
            'email' => 'Geni@gmail.com',
            'name' => 'Geni',
            'password' => Hash::make('kenkanekiTouka123')
        ]);

        $adminRole = Role::create(['name' => 'Admin']);
        $adminUser->assignRole($adminRole);

        \App\Models\EstateMarket::factory(10)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
