<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_id',
        'type'
    ];

    function item()
    {
        return $this->belongsTo($this->type == "webinar" ? Webinar::class : Course::class,"item_id","id");
    }
}
