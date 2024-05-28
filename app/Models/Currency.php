<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cookie;

class Currency extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'currency',
    ];

    static function getCur(){
        $id = intval(Cookie::get("currency_id",1));
        return Currency::find($id)->currency_name;
    }

    static function getCurId(){
        return intval(Cookie::get("currency_id",1));

    }
}
