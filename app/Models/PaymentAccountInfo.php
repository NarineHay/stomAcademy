<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAccountInfo extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    function item()
    {
        return $this->belongsTo($this->type == "webinar" ? Webinar::class : Course::class,"item_id","id");
    }
}
