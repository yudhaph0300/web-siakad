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
            'role' => 'student',
            'id_class' => $this->faker->randomElement([1, 2]),
        ];
    }
}
