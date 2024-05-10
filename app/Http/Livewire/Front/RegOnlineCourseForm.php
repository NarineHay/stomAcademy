<?php

namespace App\Http\Livewire\Front;

use App\Helpers\CRM;
use App\Mail\RegOnlineCourseFormMail;
use App\Models\Course;
use App\Models\Currency;
use App\Models\Webinar;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Illuminate\Support\Str;

class RegOnlineCourseForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $item_id;
    public $type;
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
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        $cur = Str::lower($cur->currency_name);

        $data = $this->validate();
        if($this->type == 'courses'){
            $item  = Course::find($this->item_id);
        }
        if($this->type == 'webinars'){
            $item  = Webinar::find($this->item_id);
        }
        // Mail::to("admin@stom.mawcompany.com")->send(new RegOnlineCourseFormMail($data));
        $this->success = true;
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        // $this->question = "";
        $this->item_id = '';

        $data['price'] = $item->sale != null ? $item->sale->$cur : $item->price->$cur;
        $data['course_name'] = $item->infos->where('lg_id', 1)->first()->title;
        $data['type'] = $this->type;
        $data['cur'] = $cur;

        App::getLocale() == 'ru' ? CRM::regOnlineCoureRU($data) : CRM::regOnlineCoureEN($data);


    }
    public function render()
    {
        return view('livewire.front.reg-online-course-form');
    }
}
