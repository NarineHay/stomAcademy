<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminWebinarStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'start_date' => 'required',
            'duration' => 'required',
            'description' => 'required',
            'program' => 'required',
        ];
    }
}
