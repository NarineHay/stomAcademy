<?php

namespace App\Observers;

use App\Models\Language;
use App\Models\user;

class UserObserver
{
    public function created(user $user)
    {
        $user->userinfo()->create();
        $lector = $user->lector()->create();
        foreach (Language::all() as $lg){
            $lector->infos()->create([
                "lg_id" => $lg->id
            ]);
        }

        $user->balance()->create();
    }

    public function updated(user $user)
    {
        //
    }


    public function deleted(user $user)
    {
        //
    }

    public function restored(user $user)
    {
        //
    }

    public function forceDeleted(user $user)
    {
        //
    }
}
