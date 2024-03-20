<?php

namespace Database\Seeders;

use App\Models\Dino;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DinoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $dinos = Dino::where('name', '!=', '0')->get();
        foreach ($users as $user) {
            $user->dinos()->sync($dinos->random());
        }
    }
}
