<?php

namespace App\Http\Livewire\Front;

use App\Mail\RegOnlineCourseFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RegOnlineCourseForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $success = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
    ];
    public function mount()
    {
        $this->messages = [
            'name.required' =>  __("courses.reg.form.reg_required_inputs"),
            'email.required' => __("courses.reg.form.reg_required_inputs"),
            'email.email' => __("courses.reg.form.reg_email_required_email"),
            'phone.required' => __("courses.reg.form.reg_required_inputs"),
        ];
    }

    protected array $messages = [];

    public function submit()
    {
        $data = $this->validate();
//        dd($data);
        Mail::to("admin@stom.mawcompany.com")->send(new RegOnlineCourseFormMail($data));
        $this->success = true;
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->question = "";
//        $this->name = "";
//        $this->email = "";
//        $this->phone = "";

    }
    public function render()
    {
        return view('livewire.front.reg-online-course-form');
    }
}
