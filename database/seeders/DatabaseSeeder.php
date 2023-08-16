<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        $this->call(AdminCredentialSeeder::class);

        $representative = \App\Models\User::factory()->create([
            'name' => 'Jericho P. Bantiquete',
            'email' => 'representative@psu.edu.ph',
            'password' => Hash::make('representative@psu.edu.ph'),
        ]);
        $representative->addRole('representative');
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
