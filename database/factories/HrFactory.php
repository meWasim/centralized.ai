<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hr>
 */
class HrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { return [
        'name' => $this->faker->name,
        'company_id' => Company::factory(), // Automatically create a related company
        'phone_number' => $this->faker->phoneNumber,
        'email' => $this->faker->unique()->safeEmail,
        'linkedin' => $this->faker->url,
    ];
    }
}
