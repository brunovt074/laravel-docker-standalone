<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Costumer;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Costumer>
 */
class CostumerFactory extends Factory
{
    protected $model = Costumer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'level' => $this->faker->numberBetween(0, 5),
            'address' => $this->faker->address,
        ];
    }
}
