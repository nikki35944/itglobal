<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
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
            'due_time' => $this->faker->dateTimeBetween('+3 days', '+15 days', 'Europe/Moscow'),
            'completion_time' => null,
            'status_id' => random_int(1, 2),
            'user_id' => User::get()->random()->id,
        ];
    }
}
