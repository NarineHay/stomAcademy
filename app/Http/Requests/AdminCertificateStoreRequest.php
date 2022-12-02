<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCertificateStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course_id' => 'required',
//            'name_x' => 'required',
//            'name_y' => 'required',
//            'hour_x' => 'required',
//            'hour_y' => 'required',
//            'id_x' => 'required',
//            'id_y' => 'required',
            'type' => 'required',
            'date' => 'required',
            'image' => 'required',
        ];
    }
}
