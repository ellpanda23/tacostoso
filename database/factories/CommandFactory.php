<?php

namespace Database\Factories;

use App\Models\Command;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Command>
 */
class CommandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => $this->faker->randomElement([Command::ACTIVE, Command::PAID]),
            'user_id' => User::all()->random()->id,
            'table_id' => Table::all()->random()->id,
        ];
    }
}
