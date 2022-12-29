<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogInfo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'text',
        'image',
        'lg_id',
        'blog_id'
    ];

}
