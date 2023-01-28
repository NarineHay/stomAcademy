<?php

namespace App\Http\Livewire\Front;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Support extends Component
{
    public $active_chat = null;
    public $message = null;
    public function render()
    {
        if(Auth::user()->role == User::ROLE_USER) {
            $chats = Chat::query()->where("user_id", Auth::user()->id)->get();
        }else{
            $chats = Chat::query()->where("moder_id", Auth::user()->id)->get();
        }
        $chats->map(function ($chat){
            $count = ChatMessage::query()->where("status",false)->where("chat_id",$chat->id)->count();
            $chat['count'] = $count;
            return $chat;
        });
        $data['chats'] = $chats;
        if($this->active_chat){
            $this->active_chat = Chat::query()->where("id",$this->active_chat['id'])->with("messages")->first();
        }
        $data['route'] = Route::current()->uri();
        return view('livewire.front.support',$data);
    }

    public function select_chat($chat){
        $this->active_chat = $chat;

    }

    public function send_message(){
        if($this->message && strlen($this->message) > 0){
            $this->active_chat->messages()->create([
                "user_id" => Auth::user()->id,
                "message" => $this->message
            ]);
            $this->message = null;
        }
    }

    public function refresh(){
        $this->render();
    }
}
