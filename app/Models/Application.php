<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $guarded = [];
    function infos()
    {
        return $this->hasMany(ApplicationInfo::class, "application_id", "id");
    }

    function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

}
