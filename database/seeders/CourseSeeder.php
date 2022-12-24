<?php

namespace Database\Seeders;

use App\Models\Course;
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

        for ($i = 0; $i < 100; $i++) {
            $course = Course::factory(1)->make()->first();
            $course->price_id = $price->random(1)->first()->id;
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
