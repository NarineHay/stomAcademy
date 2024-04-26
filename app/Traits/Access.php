<?php
namespace App\Traits;

use App\Models\Access as ModelsAccess;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use App\Models\Webinar;

trait Access {

    public function setAccess($order_id){

        $order = Order::find($order_id);
        $items = $order->infos;
        $user = User::find($order->user_id);

        foreach ($items as $key => $item) {

            // if($item->type == "webinar"){
            //     $item = Webinar::query()->where("id",$item->item_id)->first();
            // }elseif($item->type == "course"){
            //     $item = Course::query()->where("id",$item->item_id)->first();
            // }

            $access = new ModelsAccess();
            $access->manager_id = $this->admin()->id;
            $access->user_id = $user->id;
            if ($item->type == "course") {
                $access->course_id = $item->item_id;
            } else {
                $access->webinar_id = $item->item_id;
            }
            $access->access_time = 5;
            // if ($access_time) {
            //     $access->duration = $duration;
            // }
            $access->save();

        }

        // $subject = 'aaaaa';
        // mail::send(new SendAccessInfoEmail($items, $subject));

    }

    public function admin(){
        return User::where('role', 'admin')->first();
    }
}
