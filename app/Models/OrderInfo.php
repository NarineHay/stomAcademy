<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "item_id"
    ];

    function item()
    {
        return $this->belongsTo($this->type == "webinar" ? Webinar::class : Course::class,"item_id","id");
    }
}
