<?php

namespace App\Models;

use App\Helpers\LG;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable=[
        'title',
        'description',
        'status'
    ];

    function getTitleAttribute(){
        return $this->titleLg->title;
    }

    function titleLg(){
        return $this->hasOne(DirectionTitle::class,"direction_id","id")->where("lg_id",LG::get());
    }
}
