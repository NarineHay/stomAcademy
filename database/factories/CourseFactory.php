<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    public function definition()
    {
        return [
            'start_date'=> $this->faker->dateTime,
            'end_date'=> $this->faker->dateTime,
            'video'=> $this->faker->url,
            'url_to_page' => $this->faker->url,
            //'image' => 'public/course/courseimage.jpg',
        ];
    }
}
