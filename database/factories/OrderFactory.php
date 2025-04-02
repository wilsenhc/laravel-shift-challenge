<?php

namespace Database\Factories;

use App\Models\Connection;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement([
                'paid',
                'pending',
                'hold',
                'queueing',
                'running',
                'fulfilled',
            ]),
            'repository' => Str::slug(Str::lower(fake()->company())),
            'source_branch' => fake()->word(),
            'pr_number' => (string) random_int(6, 50),
            'run_at' => Carbon::now()->subDays(fake()->numberBetween(1, 7)),
            'product_id' => fake()->randomElement([
                1,
                2,
                3,
                4,
                5,
            ]),
            'connection_id' => Connection::factory(),
            'user_id' => 1,
        ];
    }
}
