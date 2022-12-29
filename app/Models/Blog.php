<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Blog extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'category_id',
    ];

    function infos(){
        return $this->hasMany(BlogInfo::class,"","id");
    }

    function info(){
        $lg_id = Session::get("lg");
        return $this->hasOne(BlogInfo::class,"blog_id",'id')
            ->where("lg_id",$lg_id);
    }
}
