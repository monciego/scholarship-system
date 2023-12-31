<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Scholarship;
use App\Models\SchoolYear;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'id_number' => 123124,
            'number_of_studying_siblings' => null,
            'monthly_income' => '000000',
            'birthday' => '1990-01-01',
            'have_existing_scholarship' => null,
            'othersInput' => null,
            'age' => null,
        ]);
        $representative->addRole('representative');

  /*       $user = \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@psu.edu.ph',
            'password' => Hash::make('johndoe@psu.edu.ph'),
        ]);
        $user->addRole('user'); */

        Scholarship::factory(10)->create();

      /*   DB::table('school_years')->insert([
            'start_school_year' => '2023-06-05',
            'end_school_year' => '2024-05-10'
        ]); */

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
