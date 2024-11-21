<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'industry' => $this->faker->randomElement(['Technology', 'Healthcare', 'Finance', 'Education']),
            'company_email' => $this->faker->unique()->companyEmail,
            'country' => $this->faker->country,
            'state' => $this->faker->state,
            'address' => $this->faker->address,
            'company_career_email' => $this->faker->unique()->safeEmail,
            'company_phone' => $this->faker->phoneNumber,
            'career_page' => $this->faker->url,
        ];

    }
}
