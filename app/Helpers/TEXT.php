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
            return "$i ". __('lectors.h2');
        }elseif($i % 10 < 5){
            return "$i ". __('lectors.h1');
        }else{
            return "$i ". __('lectors.h3');
        }
    }

    static function lectionCount($i): string
    {
        if($i % 10 == 1) {
            return "$i ".__('lectors.webinar_count1');
        }elseif($i % 10 < 5){
            return "$i ".__('lectors.webinar_count2');
        }else{
            return "$i ".__('lectors.webinar_count3');
        }
    }

    static function curHtml(): string
    {
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        $cur_name = Str::lower($cur->currency_name);
        return $cur_name;
    }

    static function curSymbol(): string
    {
        $id = intval(Cookie::get("currency_id",1));
        $cur = Currency::find($id);
        $cur_name = Str::lower($cur->currency_name) ;
        return $cur_name;
    }
}
