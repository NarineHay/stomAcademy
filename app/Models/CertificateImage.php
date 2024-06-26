<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateImage extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'image',
        'lg_id',
        'certificate_id',
    ];
}
