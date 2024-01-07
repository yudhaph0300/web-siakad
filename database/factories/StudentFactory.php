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
        $nis = $this->faker->unique()->randomNumber(6, true);

        return [
            'username' => $nis,
            'password' => bcrypt('student'),
            'nis' => $nis,
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement([1, 2]),
            'birthday' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'address' => $this->faker->address,
            'image' => 'https://images.unsplash.com/photo-1581382575275-97901c2635b7?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            'role' => 'student',
            'id_class' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
        ];
    }
}
