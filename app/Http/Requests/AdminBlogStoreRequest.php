<?php

namespace App\Http\Requests;

use App\Models\Language;
use Illuminate\Foundation\Http\FormRequest;

class AdminBlogStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title.*' => 'required',
            'text.*' => 'required',
        ];
    }

    public function messages()
    {
        $arr = [];
        foreach (Language::all() as $lg){
            $arr['title.'.$lg->id.'.required'] = 'Title for '.$lg->name.' is required';
            $arr['text.'.$lg->id.'.required'] = 'Text for '.$lg->name.' is required';
        }
        return $arr;
    }
}
