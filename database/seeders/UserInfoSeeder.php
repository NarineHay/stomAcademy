<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Database\Seeder;

class UserInfoSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        foreach($users as $user){
            $info = UserInfo::factory(1)->make()->first();
            $info->user_id = $user->id;
            $info->save();
        }
    }
}
