<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $max = $this->faker->numberBetween(0,5);
        return [
            "code" => $this->faker->word(),
            "prc" => $this->faker->numberBetween(5,15),
            "min" => $this->faker->numberBetween(3,8),
            "used" => $this->faker->numberBetween(0,$max),
            "max" => $max,
            "status" => $this->faker->boolean,
        ];
    }
}
