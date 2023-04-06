<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseDirection;
use App\Models\Direction;
use App\Models\Language;
use App\Models\Prices;
use App\Models\User;
use App\Models\WebinarDirection;
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
        $bg_images = RandomImagesApi::getImages("webinar",10,"webinar",1920);
        for ($i = 0; $i < 150; $i++) {
            $course = Course::factory(1)->make(['image' => $images[rand(0,9)],'bg_image' => $bg_images[rand(0,9)]])->first();
            $course->price_id = $price->random(1)->first()->id;
            if(fake()->boolean()){
                $course->price_2_id = $price->random(1)->first()->id;
            }
            $course->online = fake()->boolean();
//            $course->direction_id = $direction->random(1)->first()->id;
            $course->save();
            for($j = 0;$j < fake()->numberBetween(1,3);$j++){
                CourseDirection::create([
                    "direction_id" => $direction->random(1)->first()->id,
                    "course_id" => $course->id
                ]);
            }
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
