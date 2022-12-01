<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLectorStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'specialization' => 'required',
            'biography' => 'required',
            'per_of_sales' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        ];
    }
}
