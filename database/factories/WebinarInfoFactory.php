<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebinarInfo>
 */
class WebinarInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->jobTitle,
            'description'=> $this->faker->realText(300),
            'program'=> $this->faker->text,
            'video_invitation'=> $this->faker->url,
            'video'=> $this->faker->url,
        ];
    }
}
