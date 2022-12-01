<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'duration',
        'description',
        'program',
        'video_invitation',
        'price_id',
        'video',
        'status',
        'image',
        'user_id'
    ];

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
}
