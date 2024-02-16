<?php

namespace App\Console\Commands;

use App\Models\Dino;
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
        $promocode = Promocode::first();
        dd($promocode->expired_at->toDateString());
    }
}
