<?php

namespace Database\Seeders;

use App\Models\Access;
use App\Models\Course;
use App\Models\User;
use App\Models\Webinar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    public function run()
    {
        $users = User::query()->where("role",User::ROLE_USER)->get()->random(8);
        $managers = User::query()->where("role",User::ROLE_ADMIN)->orWhere("role",User::ROLE_MODER)->get();
        $webinars = Webinar::all();
        $courses = Course::all();
        foreach ($users as $k => $user){
            for($i=0;$i<rand(10,20);$i++){
                if(fake()->boolean()){
                    $course_id = $courses->random(1)->first()->id;
                    $webinar_id = null;
                }else{
                    $course_id = null;
                    $webinar_id = $webinars->random(1)->first()->id;
                }
                $access_time = rand(0,10) % 2;
                Access::create([
                    "user_id" => $user->id,
                    "course_id" => $course_id,
                    "webinar_id" => $webinar_id,
                    "manager_id" => $managers->random(1)->first()->id,
                    "access_time" => $access_time,
                    "duration" => $access_time ? intval(rand(10,30)) : null,
                ]);
            }
        }
    }
}
