<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $data = [
            'user_id' => 'required',
            'sum' => 'required',
            'cur' => 'required'


        ];

        if(request()->course_ids == null && request()->webinar_ids == null){
            $data['course_ids'] = 'required';
            $data['webinar_ids'] = 'required';

        }

        if(request()->routeIs('admin.payment_create_account')){
            $data['type'] = 'required';
        }

        return $data;
    }
}
