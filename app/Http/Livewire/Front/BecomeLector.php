<?php

namespace App\Http\Livewire\Front;

use App\Helpers\CRM;
use App\Jobs\SendLectorMail;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class BecomeLector extends Component
{
    public $name;
    public $email;
    public $phone;
    public $success = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'nullable',
    ];

    protected $messages = [
        'email.required' => 'Поля обязательные для заполнения.',
        'email.email' => 'Формат адреса электронной почты недействителен.',
        'validation.required' => 'Поля обязательные для заполнения.',
        'name.required' => 'Поля обязательные для заполнения.',
    ];

    function __construct($id = null)
    {
        parent::__construct($id);
        $this->isHomePage = Route::is('home');
    }

    public function submit()
    {
        $data = $this->validate();
        // SendLectorMail::dispatch($data);

        $leadData = [
            'name' => 'Заявк  стать лектором \n',
            'status_id' => 65470045,
            'price' => 1000,
            'pipeline_id' => 7657865
        ];

        // $crm = new CRM();
        $crm = CRM::becomeLector($data);
        $this->success = true;
        $this->name = "";
        $this->email = "";
        $this->phone = "";
    }

    public function render()
    {
        return view('livewire.front.become-lector');
    }
}
