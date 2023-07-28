<?php

namespace App\Http\Livewire\Front;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Support extends Component
{
    public $active_chat = null;
    public $message = null;
    public $search = "";

    function closeChat(){
        $this->active_chat = null;
    }

    public function render()
    {
        $ids = [];
        if($this->search){
            $ids_arr = DB::select(DB::raw('SELECT chat_id FROM chat_messages WHERE message LIKE "%'.$this->search.'%" GROUP BY chat_id'));
            $ids = collect($ids_arr)->map(function ($value){
                return $value->chat_id;
            });
        }else{
            $ids = Chat::query()->get()->map(function ($chat){
                return $chat->id;
            });
        }
        if(Auth::user()->role == User::ROLE_USER) {
            $chats = Chat::query()->whereIn("id",$ids)->where("user_id", Auth::user()->id)->get();
        }else{
            $chats = Chat::query()->whereIn("id",$ids)->where("moder_id", Auth::user()->id)->orWhereNull("moder_id")->withCount("messages")
                ->get()->filter(function ($chat){
                return $chat->messages_count > 0;
            });
        }
        $chats->map(function ($chat){
            if(Auth::user()->role == User::ROLE_USER) {
                $count = ChatMessage::query()->where("status", 0)->whereNot('user_id',Auth::user()->id)->where("chat_id", $chat->id)->count();
            }else{
                $count = ChatMessage::query()->where("status", "<",2)->whereNot('user_id',Auth::user()->id)->where("chat_id", $chat->id)->count();
            }
            $chat['count'] = $count;
            return $chat;
        });
        $data['chats'] = $chats;
        if($this->active_chat){
            $this->active_chat = Chat::query()->where("id",$this->active_chat['id'])->with("messages")->first();
            if(Auth::user()->role == User::ROLE_USER) {
                ChatMessage::query()->where("chat_id",$this->active_chat->id)->whereNot("user_id",Auth::user()->id)->where("status",0)->update(['status' => 1]);
            }else {
                ChatMessage::query()->where("chat_id",$this->active_chat->id)->whereNot("user_id",Auth::user()->id)->where("status","<",2)->update(['status' => 2]);
            }
        }
        $data['route'] = Route::current()->uri();
        return view('livewire.front.support',$data);
    }

    public function select_chat($chat){
        $this->active_chat = $chat;
    }

    public function new_chat(){
        $chat = new Chat();
        $chat->user_id = Auth::user()->id;
        $chat->save();
        $this->select_chat($chat);
    }

    public function send_message(){
        if($this->message && strlen($this->message) > 0){
            if(is_null($this->active_chat->moder_id) && Auth::user()->role != User::ROLE_USER){
                Chat::query()->where("id",$this->active_chat->id)->update([
                    "moder_id" => Auth::user()->id
                ]);
            }
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
