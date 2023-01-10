<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WebinarFactory extends Factory
{
    public function definition()
    {
        return [
            'start_date'=> $this->faker->dateTime,
            'duration'=> $this->faker->numberBetween(30,120),
            'url_to_page' => $this->faker->url,
        ];
    }
}
