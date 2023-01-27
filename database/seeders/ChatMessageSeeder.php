<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatMessageSeeder extends Seeder
{
    public function run()
    {
        $chats = Chat::all();
        foreach ($chats as $chat){
            $users = [
                $chat->user_id,
                $chat->moder_id
            ];
            for($i=0;$i < rand(10,100);$i++){
                ChatMessage::create([
                    'chat_id' => $chat->id,
                    'user_id' => fake()->randomElement($users),
                    'message' => fake()->realText(rand(20,300)),
                ]);
            }
        }
    }
}
