<?php

namespace App\Observers;

use App\Models\CourseInfo;
use Illuminate\Support\Str;

class CourseInfoObserver
{
    /**
     * Handle the CourseInfo "created" event.
     *
     * @param  \App\Models\CourseInfo  $courseInfo
     * @return void
     */
    public function created(CourseInfo $courseInfo)
    {
        $courseInfo->slug = Str::slug($courseInfo->title);
        $courseInfo->save();
    }

    /**
     * Handle the CourseInfo "updated" event.
     *
     * @param  \App\Models\CourseInfo  $courseInfo
     * @return void
     */
    public function updated(CourseInfo $courseInfo)
    {
        $courseInfo->slug = Str::slug($courseInfo->title);
        $courseInfo->save();
    }

    /**
     * Handle the CourseInfo "deleted" event.
     *
     * @param  \App\Models\CourseInfo  $courseInfo
     * @return void
     */
    public function deleted(CourseInfo $courseInfo)
    {
        //
    }

    /**
     * Handle the CourseInfo "restored" event.
     *
     * @param  \App\Models\CourseInfo  $courseInfo
     * @return void
     */
    public function restored(CourseInfo $courseInfo)
    {
        //
    }

    /**
     * Handle the CourseInfo "force deleted" event.
     *
     * @param  \App\Models\CourseInfo  $courseInfo
     * @return void
     */
    public function forceDeleted(CourseInfo $courseInfo)
    {
        //
    }
}
