<?php

namespace Database\Seeders;

use App\Models\Language;
use App\Models\Prices;
use App\Models\User;
use App\Models\Webinar;
use App\Models\WebinarInfo;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    public function run()
    {
        $price = Prices::all();
        $user = User::all();
        $images = RandomImagesApi::getImages("webinar",10,"courses");
        for($i = 0;$i < 500;$i++){
            $webinar = Webinar::factory(1)->make(['image' => $images[rand(0,9)]])->first();
            $webinar->price_id = $price->random(1)->first()->id;
            $webinar->user_id = $user->random(1)->first()->id;
            $webinar->save();
            foreach (Language::all() as $lg){
                $info = WebinarInfo::factory(1)->make(['lg_id' => $lg->id])->first();
                $webinar->infos()->create($info->toArray());
            }
        }
    }
}
