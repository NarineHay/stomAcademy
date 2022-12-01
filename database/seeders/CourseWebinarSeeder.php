<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Webinar;
use App\Models\CourseWebinar;
use Illuminate\Database\Seeder;

class CourseWebinarSeeder extends Seeder
{
    public function run()
    {
        $courses = Course::all();
        $webinars = Webinar::all();
        foreach ($courses as $course){
            foreach ($webinars->random(rand(1,3)) as $webinar){
                CourseWebinar::create([
                    "course_id" => $course->id,
                    "webinar_id" => $webinar->id,
                ]);
            }
        }
    }
}
