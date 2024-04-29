<?php
namespace App\Traits\Application;

use App\Mail\SendAccessInfoEmail;
use App\Models\Access as ModelsAccess;
use App\Models\Application;
use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseWebinar;
use App\Models\Order;
use App\Models\User;
use App\Models\Webinar;
use Auth;

trait CreatApplication
{

    public function creat($data, $form)
    {

        $application = new Application();
        $application->user_id = $form == 'order' || $form == 'cart' ? Auth::id() : $data->id;
        $application->form = $form;
        $application->item_id = $data->id;
        $application->sum = $data->sum ?? null;
        $application->cur = $data->cur ?? null;
        $application->order_status = $data->order_status ?? null;
        $application->save();

        if($form == 'cart'){

            $application->infos()->create([
                "type" => $data['type'],
                "item_id" => $data['item_id']
            ]);

        }

        if ($form == 'order') {
            $items = $data->infos;

            foreach ($items as $item) {
                $application->infos()->create([
                    "type" => $item['type'],
                    "item_id" => $item['item_id']
                ]);
            }
        }

        return $application;

    }

    // public function filter($request)
    // {
    //     $payments = Order::where("status", Order::STATUS_SUCCESS);


    //     if (isset($request["user"])) {
    //         $payments = $payments->where('user_id', $request["user"]);
    //     }

    //     if (isset($request["manager"])) {
    //         $payments = $payments->where('manager', $request["manager"]);
    //     }

    //     if (isset($request["lector"])) {
    //         $lector_id = $request["lector"];
    //         $webinar_ids = Webinar::where('user_id', $lector_id)->pluck('id');
    //         $course_ids = CourseWebinar::whereIn('webinar_id', $webinar_ids)->pluck('course_id');

    //         $payments = $payments->whereHas('infos', function ($query) use ($webinar_ids, $course_ids) {
    //             $query->where(function ($subquery) use ($webinar_ids) {
    //                 $subquery->where('type', 'webinar')->whereIn('item_id', $webinar_ids);
    //             })->orWhere(function ($subquery) use ($course_ids) {
    //                 $subquery->where('type', 'course')->whereIn('item_id', $course_ids);
    //             });
    //         });
    //     }

    //     if (isset($request["from_created_at"]) && $request["from_created_at"] != null) {
    //         $payments = $payments->whereDate('created_at', '>=', $request["from_created_at"]);
    //     }

    //     if (isset($request["to_created_at"]) && $request["to_created_at"] != null) {
    //         $payments = $payments->whereDate('created_at', '<=', $request["to_created_at"]);
    //     }

    //     return $payments;

    // }
}
