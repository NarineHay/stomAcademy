<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Session;

class LG
{

    static function get(){
        return Session::get("lg") ?? 1;
    }

    static function set($lg_id){
        Session::put("lg",$lg_id);
    }

}
