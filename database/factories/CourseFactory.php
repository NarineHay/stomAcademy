<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition()
    {
        return [
            'title'=> $this->faker->jobTitle,
            'start_date'=> $this->faker->dateTime,
            'end_date'=> $this->faker->dateTime,
            'description'=> $this->faker->realText(300),
            'video'=> $this->faker->url,
        ];
    }
}
