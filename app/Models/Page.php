<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Page extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'heading',
        'url',
        'lg_id',
    ];

//    function info(){
//        $lg_id = Session::get("lg");
//        //return $this->where("lg_id",$lg_id);
//    }
}
