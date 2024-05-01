<?php

namespace App\Observers;

use App\Models\Language;
use App\Models\LectorInfo;
use App\Models\user;
use App\Traits\Application\CreatApplication;

class UserObserver
{
    use CreatApplication;
    public function created(user $user)
    {
        $user->userinfo()->create();

        if($user->role == 'lector'){
            $lector = $user->lector()->create();

            foreach (Language::all() as $lg){

                LectorInfo::create([
                    "lg_id" => $lg->id,
                    'user_id' => $user->id
                ]);

            }

        }

        $user->balance()->create();
        $this->creatApp($user, 'register');
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
