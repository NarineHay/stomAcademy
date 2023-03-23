<?php

namespace Database\Seeders;

use App\Models\Direction;
use App\Models\Language;
use App\Models\Prices;
use App\Models\User;
use App\Models\Webinar;
use App\Models\WebinarDirection;
use App\Models\WebinarInfo;
use Illuminate\Database\Seeder;

class WebinarSeeder extends Seeder
{
    public function run()
    {
        $price = Prices::all();
        $direction = Direction::all();
        $user = User::all();
        $images = RandomImagesApi::getImages("webinar",10,"webinar");
        for($i = 0;$i < 500;$i++){
            $webinar = Webinar::factory(1)->make(['image' => $images[rand(0,9)]])->first();
            $webinar->price_id = $price->random(1)->first()->id;
//            $webinar->direction_id = $direction->random(1)->first()->id;
            $webinar->user_id = $user->random(1)->first()->id;
            $webinar->save();
            for($j = 0;$j < fake()->numberBetween(1,3);$j++){
                WebinarDirection::create([
                    "direction_id" => $direction->random(1)->first()->id,
                    "webinar_id" => $webinar->id
                ]);
            }
            foreach (Language::all() as $lg){
                $info = WebinarInfo::factory(1)->make(['lg_id' => $lg->id])->first();
                $webinar->infos()->create($info->toArray());
            }
        }
    }
}
