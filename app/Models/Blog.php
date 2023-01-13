<?php

namespace App\Models;

use App\Helpers\LG;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
    ];

    function infos(){
        return $this->hasMany(BlogInfo::class,"","id");
    }

    function info(){
        $lg_id = LG::get();
        return $this->hasOne(BlogInfo::class,"blog_id",'id')
            ->where("lg_id",$lg_id);
    }

    function directions(){
        return $this->hasOne(Direction::class,"id","category_id");
    }
}
