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

    function webinar()
    {
        return $this->belongsTo(Webinar::class, 'webinar_id');
    }

    function lector_income_currency(){
        return $this->HasOne(LectorIncomesCurrency::class);
    }


}
