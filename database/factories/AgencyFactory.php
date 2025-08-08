<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agency>
 */
class AgencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'           => $this->faker->company(),
            'type'           => $this->faker->randomElement(['Board', 'Center', 'Agency']),
            'status'         => $this->faker->randomElement(['Active', 'Inactive']),
            'contact_person' => $this->faker->name(),
            'contact_email'  => $this->faker->unique()->safeEmail(),
            'contact_phone'  => $this->faker->phoneNumber(),
            'address'        => $this->faker->address(),
            'country'        => $this->faker->country(),
            'state'          => $this->faker->state(),
            'city'           => $this->faker->city(),
            'postal_code'    => $this->faker->postcode(),
            'bank_details'   => $this->faker->iban('GB'), // Example IBAN
            'payment_term'   => $this->faker->randomElement(['Advance', 'Monthly', 'Quarterly']),
            'fee_per_student'=> $this->faker->numberBetween(100, 1000),
            'total_amount'   => $this->faker->numberBetween(1000, 50000),
            'notes'          => $this->faker->sentence(),
        ];
    }
}
