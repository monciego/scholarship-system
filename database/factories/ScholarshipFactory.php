<?php

namespace Database\Factories;

use App\Models\Scholarship;
use App\Models\SchoolYear;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scholarship>
 */
class ScholarshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Scholarship::class;

    public function definition()
    {
        $scholarshipType = $this->faker->randomElement(['academic scholarship', 'private scholarship', 'government scholarship']);

        $requirements = ($scholarshipType === 'academic scholarship') ? 'ID|ROR|COR' : null;
        $slot = ($scholarshipType === 'government scholarship') ?   $this->faker->randomDigit : null;
        $applicationLink = ($scholarshipType === 'private scholarship') ? $this->faker->url : null;

          // Retrieve an existing SchoolYear from the database or create a new one
          $schoolYearId = SchoolYear::firstOrCreate([
            'start_school_year' => '2023-06-05',
            'end_school_year' => '2024-05-10',
            ])->id;

            $representative = User::where('email', 'representative@psu.edu.ph')->first();

            if (!$representative) {
                // Handle the case where the representative user does not exist.
                // You may throw an exception or log an error.
                return [];
            }


        return [
            'user_id' =>  $representative->id,
            'school_year_id' => $schoolYearId,
            'scholarshipType' => $scholarshipType,
            'scholarshipName' => $this->faker->words(3, true),
            'deadlineAt' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Deadline in the future
            'availableFor' => $this->faker->word,
            'status' => $this->faker->randomElement(['Available', 'notAvailable', 'onHold']),
            'slot' => $slot,
            'applicationLink' => $applicationLink,
            'details' => $this->faker->optional()->paragraph,
            'requirements' => $requirements,
        ];
    }
}
