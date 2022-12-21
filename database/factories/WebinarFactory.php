<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WebinarFactory extends Factory
{
    public function definition()
    {
        return [
            'title'=> $this->faker->jobTitle,
            'start_date'=> $this->faker->dateTime,
            'duration'=> $this->faker->numberBetween(30,120),
            'description'=> $this->faker->realText(300),
            'program'=> $this->faker->text,
            'video_invitation'=> $this->faker->url,
            'video'=> $this->faker->url,
            'image' => 'public/webinar/webinarimage.jpg',
            'url_to_page' => $this->faker->url,
        ];
    }
}
