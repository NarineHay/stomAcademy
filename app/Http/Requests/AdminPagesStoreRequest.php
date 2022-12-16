<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPagesStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'meta_title' => 'required',
            'meta_description' => 'required',
            'heading' => 'required',
        ];
    }
}
