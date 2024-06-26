<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $images = RandomImagesApi::getImages("human+face",count($users),"userimages");
        foreach($users as $k => $user){
            $info = UserInfo::factory(1)->make(['image' => $images[$k]])->first();
            $user->userinfo()->update($info->toArray());
            $user->balance()->update(["balance" => rand(0,10000)/10]);
        }
    }
}
