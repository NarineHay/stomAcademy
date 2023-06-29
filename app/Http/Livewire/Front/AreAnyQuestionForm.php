<?php

namespace App\Http\Livewire\Front;

use App\Mail\AreAnyQuestionFormMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class AreAnyQuestionForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $question;
    public $success = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'question' => 'required',
    ];

    public function mount()
    {
        $this->messages = [
            'name.required' =>  __("courses.contacts.form.required_inputs"),
            'email.required' => __("courses.contacts.form.required_inputs"),
            'email.email' => __("courses.contacts.form.email_required_email"),
            'phone.required' => __("courses.contacts.form.required_inputs"),
            'question.required' => __("courses.contacts.form.required_inputs"),
        ];
    }

    protected $messages = [];

    public function submit()
    {
        $data = $this->validate();
        Mail::to("admin@stom.mawcompany.com")->send(new AreAnyQuestionFormMail($data));
        $this->success = true;
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->question = "";

    }
    public function render()
    {
        return view('livewire.front.are-any-question-form');
    }
}
