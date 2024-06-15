<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$12$Vzwh4mvXt5mefmqK4hEL3eBUREzfUT303uLJyoxp0o6D4aHQ8m8Zm',
            'phone' => fake()->phoneNumber(),
            'image' => '',
            'section_id' => Section::all()->random()->id,
            'number_of_statements' => 3,
        ];
    }
}
