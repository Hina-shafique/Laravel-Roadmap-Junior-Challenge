<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Client;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'client_id' => Client::factory(),
            'deadline' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->randomElement(['open', 'in_progress', 'completed', 'on_hold']),
        ];
    }
}
