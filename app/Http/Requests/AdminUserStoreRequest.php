<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required',Rule::unique('users')],
            'password' => 'required',
            'role' => 'required',
//            'youtube_email' => 'required',
//            'phone' => 'required',
//            'birth_date' => 'required',
//            'city' => 'required',
            'status' => 'required',
//            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
        ];
    }
}
