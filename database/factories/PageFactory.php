<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class PageFactory extends Factory
{
    public function definition()
    {
        return [
            "meta_description" => fake()->text(),
            "url" => fake()->url()
        ];
    }
}
