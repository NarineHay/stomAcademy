<?php


namespace App\Helpers;


use App\Models\Currency;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class TEXT
{
    static function lectorCount($i): string
    {
        if($i % 10 == 1) {
            return "$i лектор";
        }elseif($i % 10 < 5){
            return "$i лектора";
        }else{
            return "$i лекторов";
        }
    }

    static function lectionCount($i): string
    {
        if($i % 10 == 1) {
            return "$i лекция";
        }elseif($i % 10 < 5){
            return "$i лекции";
        }else{
            return "$i лекций";
        }
    }

    static function curHtml(): string
    {
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        $cur_name = Str::lower($cur->currency_name);
        return $cur_name;
    }
}
