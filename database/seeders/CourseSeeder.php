<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Prices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $price = Prices::all();
        for($i = 0;$i < 100;$i++){
            $info = Course::factory(1)->make()->first();
            $info->price_id = $price->random(1)->first()->id;
            $info->save();
        }
    }
}
