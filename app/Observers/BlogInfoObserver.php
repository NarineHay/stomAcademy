<?php

namespace App\Observers;

use App\Models\BlogInfo;
use Illuminate\Support\Str;

class BlogInfoObserver
{
    /**
     * Handle the BlogInfo "created" event.
     *
     * @param  \App\Models\BlogInfo  $blogInfo
     * @return void
     */
    public function created(BlogInfo $blogInfo)
    {
        $blogInfo->slug = Str::slug($blogInfo->title);
        $blogInfo->save();
    }

    /**
     * Handle the BlogInfo "updated" event.
     *
     * @param  \App\Models\BlogInfo  $blogInfo
     * @return void
     */
    public function updated(BlogInfo $blogInfo)
    {
        $blogInfo->slug = Str::slug($blogInfo->title);
        $blogInfo->save();
    }

    /**
     * Handle the BlogInfo "deleted" event.
     *
     * @param  \App\Models\BlogInfo  $blogInfo
     * @return void
     */
    public function deleted(BlogInfo $blogInfo)
    {
        //
    }

    /**
     * Handle the BlogInfo "restored" event.
     *
     * @param  \App\Models\BlogInfo  $blogInfo
     * @return void
     */
    public function restored(BlogInfo $blogInfo)
    {
        //
    }

    /**
     * Handle the BlogInfo "force deleted" event.
     *
     * @param  \App\Models\BlogInfo  $blogInfo
     * @return void
     */
    public function forceDeleted(BlogInfo $blogInfo)
    {
        //
    }
}
