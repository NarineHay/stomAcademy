<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAccount extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    function infos()
    {
        return $this->hasMany(OrderInfo::class,"order_id","id");
    }

    function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
