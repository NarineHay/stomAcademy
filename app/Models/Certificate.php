<?php

namespace App\Models;

use App\Helpers\LG;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Certificate extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'course_id',
        'name_x',
        'name_y',
        'hour_x',
        'hour_y',
        'id_x',
        'id_y',
        'type',
        'hours_number',
        'date',
    ];

    function course(){
        return $this->hasOne(Course::class,"id","course_id");
    }

    function infos(){
        return $this->hasMany(CertificateImage::class,"","id");
    }

    function info(){
        $lg_id = LG::get();
        return $this->hasOne(CertificateImage::class,"",'id')
            ->where("lg_id",$lg_id);
    }
}
