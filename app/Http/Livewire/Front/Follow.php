<?php

namespace App\Http\Livewire\Front;

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

    public function render()
    {
        return view('livewire.front.follow');
    }

    public function submit()
    {
        $this->validate();

        Followers::create([
            'name' => $this->name,
            'email' => $this->email,
            $this->success = true,
        ]);
    }
}
