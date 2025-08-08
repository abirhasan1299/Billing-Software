<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'           => $this->faker->name(),
            'enrollment'     => strtoupper($this->faker->bothify('ENR-####')), // e.g., ENR-1234
            'dob'            => $this->faker->date('Y-m-d', '2005-12-31'), // realistic DOB
            'email'          => $this->faker->unique()->safeEmail(),
            'phone'          => $this->faker->numerify('##########'), // 10-digit number
            'gender'         => $this->faker->randomElement(['Male', 'Female']),
            'father'         => $this->faker->name('male'),
            'mother'         => $this->faker->name('female'),
            'status'         => $this->faker->randomElement(['Active', 'Inactive']),
            'total_fee'      => $this->faker->numberBetween(1000, 5000),
            'fee_paid'       => 0,
            'ref_agency'     => $this->faker->company(),
            'ref_lead'       => $this->faker->name(),
            'address'        => $this->faker->address(),
            'city'           => $this->faker->city(),
            'state'          => $this->faker->state(),
            'postal_code'    => $this->faker->numberBetween(1000, 99999),
            'country'        => $this->faker->country(),
            'course'         => $this->faker->randomElement(['Science', 'Arts', 'Commerce', 'IT']),
            'batch'          => strtoupper($this->faker->bothify('BATCH-##')),
            'admission_date' => $this->faker->date('Y-m-d'),
            'created_at'     => now(),
            'updated_at'     => now(),

        ];
    }
}
