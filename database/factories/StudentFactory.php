<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['Male', 'Female']),
            'dob' => fake()->date(),
            'photo_url' => fake()->imageUrl(),
            'address' => fake()->address(),
            'grade' => 'G' . fake()->numberBetween(1, 12),
            'session' => fake()->randomElement(['Morning', 'Afternoon']),
            'parent_contact' => fake()->phoneNumber(),
            'enrolled_date' => fake()->date(),
            'status' => fake()->randomElement(['active', 'inactive', 'graduated', 'transferred']),
        ];
    }
}
