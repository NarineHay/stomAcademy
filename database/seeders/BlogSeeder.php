<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Direction;
use App\Models\Language;
use App\Models\WebinarInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $directions = Direction::all();
        $images = RandomImagesApi::getImages("webinar",10,"webinar");
        for($i=0;$i<100;$i++){
            $blog = Blog::create(['category_id' => $directions->random(1)->first()->id]);
            foreach (Language::all() as $lg){
                $info = Blog::factory(1)->make(['lg_id' => $lg->id,'image' => $images[rand(0,9)]])->first();
                $blog->infos()->create($info->toArray());
            }
        }
    }
}
