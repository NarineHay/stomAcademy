<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageInfo extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'meta_title',
        'meta_description',
        'heading',
        'lg_id',
        'page_id'
    ];
}
