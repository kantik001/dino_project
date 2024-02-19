<?php

namespace App\Console\Commands;

use App\Mappers\IndexMapper;
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

        $orders = Order::all();
        $orders = IndexMapper::index($orders);
        dd($orders->toArray());
    }
}
