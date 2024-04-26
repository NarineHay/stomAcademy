<?php

namespace App\Http\Livewire\Front;

use App\Helpers\Sendpulse\Follow as SendpulseFollow;
use App\Models\Followers;
use Livewire\Component;

class Follow extends Component
{
    public $name;
    public $email;
    public $success = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
    ];

    protected $messages = [
        'email.required' => 'Поля обязательные для заполнения.',
        'email.email' => 'Формат адреса электронной почты недействителен.',
        'validation.required' => 'Поля обязательные для заполнения.',
        'name.required' => 'Поля обязательные для заполнения.',
    ];

    public function render()
    {
        $data['success'] = $this->success;

        return view('livewire.front.follow',$data);
    }

    public function submit()
    {
        $this->validate();

        // Followers::create([
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     $this->success = true,
        // ]);

        $data = [
            'name' => $this->name,
            'email' => $this->email
        ];

        SendpulseFollow::follow($data);
        $this->success= true;
    }
}
