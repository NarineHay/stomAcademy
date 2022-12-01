<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPriceStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'byn' => 'required',
            'rub' => 'required',
            'usd' => 'required',
            'eur' => 'required',
            'uah' => 'required',
        ];
    }
}
