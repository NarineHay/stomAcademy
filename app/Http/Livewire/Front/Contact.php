<?php

namespace App\Http\Livewire\Front;

use App\Jobs\SendMail;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Contact extends Component
{
    public $name;
    public $email;
    public $question;
    public $success = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'question' => 'nullable',
    ];

    function __construct($id = null)
    {
        parent::__construct($id);
        $this->isContactPage = Route::is('contacts');
    }

    public function submit()
    {
        $data = $this->validate();
        SendMail::dispatch($data);
        $this->success = true;
        $this->name = "";
        $this->email = "";
        $this->question = "";
    }
    public function render()
    {
        return view('livewire.front.contact');
    }
}
