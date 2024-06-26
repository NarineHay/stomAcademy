<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDirection extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'direction_id',
    ];

    function direction(){
        return $this->belongsTo(Direction::class,"direction_id","id");
    }

    function user(){
        return $this->belongsTo(User::class,"user_id",'id');
    }
}
