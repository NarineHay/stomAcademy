<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Prices extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable=[
        'name',
        'byn',
        'rub',
        'usd',
        'eur',
        'uah',
    ];

    function html(){
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        $cur_name = Str::lower($cur->currency_name);
        return view('components.price',[
            "price" => $this->attributes[$cur_name],
            "currency_name" => $cur_name
        ]);
    }

    function pure(){
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        $cur_name = Str::lower($cur->currency_name);
        return $this->attributes[$cur_name];
    }
}
