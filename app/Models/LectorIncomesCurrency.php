<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectorIncomesCurrency extends Model
{
    use HasFactory;
    protected $guarded = [];

    function lector_income()
    {
        return $this->belongsTo(LectorIncome::class, 'lector_income_id');
    }
}
