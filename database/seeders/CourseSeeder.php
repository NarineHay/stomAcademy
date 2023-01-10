<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Direction;
use App\Models\Language;
use App\Models\Prices;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $price = Prices::all();
        $lgs = Language::all();
        $direction = Direction::all();
        $images = RandomImagesApi::getImages("webinar",10,"webinar");
        for ($i = 0; $i < 100; $i++) {
            $course = Course::factory(1)->make(['image' => $images[rand(0,9)]])->first();
            $course->price_id = $price->random(1)->first()->id;
            $course->direction_id = $direction->random(1)->first()->id;
            $course->save();
            foreach ($lgs as $lg) {
                $course->infos()->create([
                    'lg_id' => $lg->id,
                    'title' => fake()->jobTitle,
                    'description' => fake()->realText(),
                ]);
            }
        }
    }
}
