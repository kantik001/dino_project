<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'Admin',
            'email' => 'system@system',
            'password' => Hash::make('123123123'),
            'email_verified_at' => now()->toDateString()
        ];
        $user = User::firstOrCreate([
            'email' => $user['email'],
        ], $user);
        $adminId = Role::where('title', 'admin')->first()->id;
        $user->roles()->sync($adminId);


        $users = User::factory(20)->create();
        $roles = Role::where('title', '!=', 'admin')->get();
        foreach ($users as $user) {
            $user->roles()->sync($roles->random());
        }

    }
}
