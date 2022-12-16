<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'course_id',
        'webinar_id',
        'sum',
        'currency',
        'manager',
        'comment'
    ];

    function user(){
        return $this->hasOne(User::class,"id","user_id");
    }
}
