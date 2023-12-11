<?php

namespace App\Observers;

use App\Models\UserInfo;
use Illuminate\Support\Str;

class UserInfoObserver
{
    /**
     * Handle the UserInfo "created" event.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return void
     */
    public function created(UserInfo $userInfo)
    {
        $userInfo->slug = Str::slug($userInfo->fname.'-'.$userInfo->lname);
        $userInfo->save();
    }

    /**
     * Handle the UserInfo "updated" event.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return void
     */
    public function updated(UserInfo $userInfo)
    {
        $userInfo->slug = Str::slug($userInfo->fname.'-'.$userInfo->lname);
        $userInfo->save();
    }

    /**
     * Handle the UserInfo "deleted" event.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return void
     */
    public function deleted(UserInfo $userInfo)
    {
        //
    }

    /**
     * Handle the UserInfo "restored" event.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return void
     */
    public function restored(UserInfo $userInfo)
    {
        //
    }

    /**
     * Handle the UserInfo "force deleted" event.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return void
     */
    public function forceDeleted(UserInfo $userInfo)
    {
        //
    }
}
