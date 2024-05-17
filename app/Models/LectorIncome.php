<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectorIncome extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function lector()
    {
        return $this->belongsTo(Lector::class, 'user_id');
    }

    function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id');
    }


    function item()
    {
        return $this->belongsTo($this->type == "webinar" ? Webinar::class : Course::class,"item_id","id");
    }

    function price(){
        return $this->hasOne(Prices::class,"id","price_id");
    }

    function sale(){
        return $this->hasOne(Prices::class,"id","price_2_id");
    }

}
