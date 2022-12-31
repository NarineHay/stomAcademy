<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class BlogFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'text' => $this->faker->realText(1000),
        ];
    }
}
