<?php

namespace App\Console\Commands;

use App\Models\Dino;
use App\Models\Order;
use App\Models\Promocode;
use App\Models\User;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $from = '50';
        $to = '200';
        $orders = Order::failedOrders($from,$to)->get();
        dd($orders->toArray());
    }
}
