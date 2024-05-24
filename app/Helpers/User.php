<?php


namespace App\Helpers;


use App\Models\Language;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Session;

class User
{
    static function getEmail($id){
        $user = ModelsUser::find($id);
        return $user !=null ? $user->email : '';
    }



}
