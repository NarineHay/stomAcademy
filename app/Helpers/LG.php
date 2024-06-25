<?php


namespace App\Helpers;


use App\Models\Language;
use Illuminate\Support\Facades\Session;

class LG
{
    static function get(){
        return Session::get("lg") ?? 1;
    }

    static function set($lg_id){
        Session::put("lg",$lg_id);
    }

    static function getCode(){
        $id = self::get();
        return Language::find($id)->code;
    }

    static function getId($code){
        return Language::where('code', $code)->first()->id;
    }

    static function getAllCode(){
        $codes =  Language::pluck('code', 'id')->toArray();

        return array_map('strtolower', $codes);
    }


    static function languages(){
        return  Language::all();
    }

    static function getEuropeCountryCodes(){
        return ['at', 'be', 'bg', 'cy', 'cz', 'de', 'dk', 'ee', 'es', 'fi', 'fr', 'gr', 'hu', 'hr', 'ie', 'it', 'lt', 'lu', 'lv', 'mt', 'nl', 'pl', 'pt', 'ro', 'se', 'si', 'sk'];
    }

}
