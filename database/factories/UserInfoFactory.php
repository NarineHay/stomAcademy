<?php

namespace Database\Factories;

use App\Models\UserInfo;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;



class UserInfoFactory extends Factory
{
    protected $model = UserInfo::class;
    public function definition()
    {
            return [
                'youtube_email' => fake()->unique()->safeEmail(),
                'phone' => $this->faker->phoneNumber(),
                'birth_date' => $this->faker->date(),
                'city' => $this->faker->city(),
                'country_id' => $this->faker->numberBetween(1,249),
                //'image' => 'public/userimages/'.$name,
            ];
    }
}
