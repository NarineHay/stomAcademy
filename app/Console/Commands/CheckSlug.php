<?php

namespace App\Console\Commands;

use App\Models\BlogInfo;
use App\Models\CourseInfo;
use App\Models\UserInfo;
use App\Models\WebinarInfo;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CheckSlug extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_slug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        WebinarInfo::query()->get()->map(function ($web_info){
            if($web_info->title){
                $this->info($web_info->title);
                $this->info(Str::slug($web_info->title));
                $web_info->slug =  Str::slug($web_info->title);
                $web_info->saveQuietly();
            }
        });

        CourseInfo::query()->get()->map(function ($web_info){
            if($web_info->title){
                $this->info($web_info->title);
                $this->info(Str::slug($web_info->title));
                $web_info->slug =  Str::slug($web_info->title);
                $web_info->saveQuietly();
            }
        });
        BlogInfo::query()->get()->map(function ($web_info){
            if($web_info->title){
                $this->info($web_info->title);
                $this->info(Str::slug($web_info->title));
                $web_info->slug =  Str::slug($web_info->title);
                $web_info->saveQuietly();
            }
        });
        UserInfo::query()->get()->map(function ($web_info){
            if($web_info->fname && $web_info->lname){
                $this->info($web_info->fname.'-'.$web_info->lname);
                $this->info(Str::slug($web_info->fname.'-'.$web_info->lname));
                $web_info->slug =  Str::slug($web_info->fname.'-'.$web_info->lname);
                $web_info->saveQuietly();
            }
        });


        return Command::SUCCESS;
    }
}
