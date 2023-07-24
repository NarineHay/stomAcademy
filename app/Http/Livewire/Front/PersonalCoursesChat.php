<?php

namespace App\Http\Livewire\Front;

use App\Models\UserInfo;
use App\Models\Webinar;
use App\Models\WebinarChatMessage;
use App\Models\WebinarDirection;
use App\Models\WebinarInfo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonalCoursesChat extends Component
{
    public $webinar_id;

    public $user_id;
    public $message;

    public $messages = [];

    protected $listeners = ['updateMessages' => '$refresh'];

    public function render()
    {
        $this->messages = WebinarChatMessage::query()
            ->with("userInfo")->with("user")
            ->where("webinar_id",$this->webinar_id)->get();
//        dd($this->messages[0]->userInfo->fullName);
        return view('livewire.front.personal-courses-chat');
    }

    public function new_message(){
        $new_message = new WebinarChatMessage();
        $new_message->user_id = Auth::user()->id;
        $new_message->webinar_id = $this->webinar_id;
        $new_message->message = $this->message;
        $this->message = "";
        $new_message->save();
    }
}
