<?php

namespace App\Models;

use App\Helpers\LG;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Webinar extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'start_date',
        'duration',
        'price_id',
        'status',
        'image',
        'user_id',
        'url_to_page',
    ];

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    function infos(){
        return $this->hasMany(WebinarInfo::class,"webinar_id",'id');
    }

    function info(){
        $lg_id = LG::get();
        return $this->hasOne(WebinarInfo::class,"webinar_id",'id')
            ->where("lg_id",$lg_id);
    }
}
