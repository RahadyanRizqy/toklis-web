<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElectricToken>
 */
class ElectricTokenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token_number' => $this->faker->unique()->numerify(str_repeat('#', 20)),
            'token_status' => $this->faker->randomElement([0, 1]),
            'purchased_date' => $this->faker->dateTimeBetween('2023-08-01 00:00:00', '2023-12-31 23:59:59')->format('d-m-Y H:i'),
            'cost' => $this->faker->randomElement([50000, 100000])
        ];
    }
}
