<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendLectorMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data = [];

    public function __construct($arr)
    {
        $this->data = $arr;
    }

    public function handle()
    {
        Mail::send('mail.sendLectorMail',$this->data,function ($message){
            $message->to('manukyanalisa486@gmail.com')->subject
            ('StomAcademy become lector');
        });
    }
}
