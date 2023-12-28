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
            'nis' => fake()->unique()->randomNumber(6, true),
            'name' => fake()->name(),
            'username' => fake()->unique()->randomNumber(6, true),
            'password' => bcrypt('password'),
            'role' => 'student'
        ];
    }
}
