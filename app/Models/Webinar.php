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
        'direction_id',
        'price_id',
        'status',
        'image',
        'user_id',
        'url_to_page',
    ];

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    function price(){
        return $this->hasOne(Prices::class,"id","price_id");
    }

    function directions(){
        return $this->hasManyThrough(
            Direction::class,
            WebinarDirection::class,
            'webinar_id', // Foreign key on users table...
            'id', // Foreign key on posts table...
            'id', // Local key on countries table...
            'direction_id' // Local key on users table...
        );
//        return $this->hasManyThrough(WebinarDirection::class,Direction::class);
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
