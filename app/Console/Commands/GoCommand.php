<?php

namespace App\Console\Commands;

use App\Models\Building;
use App\Models\Dino;
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
        $building = Building::first();
        dd($building->dino->toArray());
    }
}
