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
        'url',
    ];

    function infos(){
        return $this->hasMany(PageInfo::class,"","id");
    }

    function info(){
        $lg_id = Session::get("lg");
        return $this->hasOne(PageInfo::class,"page_id",'id')
            ->where("lg_id",$lg_id);
    }
}
