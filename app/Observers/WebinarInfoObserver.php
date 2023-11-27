<?php

namespace App\Observers;

use App\Models\WebinarInfo;
use Illuminate\Support\Str;


class WebinarInfoObserver
{
    /**
     * Handle the WebinarInfo "created" event.
     *
     * @param  \App\Models\WebinarInfo  $webinarInfo
     * @return void
     */
    public function created(WebinarInfo $webinarInfo)
    {
        $webinarInfo->slug = Str::slug($webinarInfo->title);
        $webinarInfo->save();
    }

    /**
     * Handle the WebinarInfo "updated" event.
     *
     * @param  \App\Models\WebinarInfo  $webinarInfo
     * @return void
     */
    public function updated(WebinarInfo $webinarInfo)
    {
        $webinarInfo->slug = Str::slug($webinarInfo->title);
        $webinarInfo->save();
    }

    /**
     * Handle the WebinarInfo "deleted" event.
     *
     * @param  \App\Models\WebinarInfo  $webinarInfo
     * @return void
     */
    public function deleted(WebinarInfo $webinarInfo)
    {
        //
    }

    /**
     * Handle the WebinarInfo "restored" event.
     *
     * @param  \App\Models\WebinarInfo  $webinarInfo
     * @return void
     */
    public function restored(WebinarInfo $webinarInfo)
    {
        //
    }

    /**
     * Handle the WebinarInfo "force deleted" event.
     *
     * @param  \App\Models\WebinarInfo  $webinarInfo
     * @return void
     */
    public function forceDeleted(WebinarInfo $webinarInfo)
    {
        //
    }
}
