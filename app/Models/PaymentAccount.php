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
        return $this->hasMany(PaymentAccountInfo::class, "payment_account_id", "id");
    }

    function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }
}
