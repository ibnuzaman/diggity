<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Traffic;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Traffic>
 */
class TrafficFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Traffic::class;

    public function definition()
    {
        return [
            'visitor' => $this->faker->ipv4,
            'visits' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
