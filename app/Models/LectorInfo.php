<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectorInfo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'biography',
        'lg_id',
        'user_id'
    ];
}
