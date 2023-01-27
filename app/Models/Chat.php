<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
      'user_id',
      'moder_id'
    ];

    public function messages(){
        return $this->hasMany(ChatMessage::class,"chat_id","id");
    }

    public function user(){
        return $this->hasOne(User::class,"id","user_id");
    }

    public function moder(){
        return $this->hasOne(User::class,"id","moder_id");
    }
}
