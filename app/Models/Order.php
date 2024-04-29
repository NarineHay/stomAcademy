<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS_SUCCESS = "succeeded";
    const STATUS_PANDING = "pending";

    function infos()
    {
        return $this->hasMany(OrderInfo::class,"order_id","id");
    }

    function user()
    {
        return $this->belongsTo(User::class,"user_id","id");
    }

    function application()
    {
        return $this->hasOne(Application::class, "item_id", "id");
    }

    function success()
    {
        foreach ($this->infos as $info){
            $access = new Access();
            $access->user_id = $this->user_id;
            $access->access_time = 0;
            $access->manager_id = 0;
            if($info->type == "webinar"){
                $access->webinar_id = $info->item_id;
            }else{
                $access->course_id = $info->item_id;
            }
            $access->save();
        }
        $this->status = self::STATUS_SUCCESS;
        $this->save();
        Cart::query()->where("user_id",$this->user_id)->delete();
    }
}
