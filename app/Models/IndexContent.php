<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexContent extends Model
{
    use HasFactory;

    protected $casts = [
        "popular" => "json",
        "new" => "json",
        "online_co" => "json",
        "online_le" => "json",
        "articles" => "json",
        "lectors" => "json",
    ];
}
