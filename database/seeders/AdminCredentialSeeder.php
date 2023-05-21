<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administator = \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@psu.edu.ph',
            'password' => Hash::make('administrator@psu.edu.ph'),
        ]);

        $administator->addRole('administrator');
    }
}
