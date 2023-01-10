<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Password extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:change {new_password}';

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
        $admin = User::find(1);
        $admin->password = $this->argument('new_password');
        $admin->save();
        echo "SUCCESS";
        return Command::SUCCESS;
    }
}
