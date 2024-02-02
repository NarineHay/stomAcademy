<?php

namespace App\Console\Commands;

use App\Helpers\YooKassa;
use App\Models\Order;
use Illuminate\Console\Command;

class CheckPaymentStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_payment_status';

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
        $orders = Order::query()->where("status",Order::STATUS_PANDING)->get();
        foreach ($orders as $order){
            YooKassa::checkStatus($order->payment_id);
        }
        return Command::SUCCESS;
    }
}
