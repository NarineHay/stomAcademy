<?php

namespace Database\Seeders;

use App\Models\Chat;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    public function run()
    {
        $chats = [
            ['user_id' => '5',
             'moder_id'=> '1',
            ],
            ['user_id' => '6',
             'moder_id'=> '1',
            ],
            ['user_id' => '5',
             'moder_id'=> '9',
            ],
        ];
        foreach ($chats as $chat){
            Chat::create($chat);
        }
    }
}
