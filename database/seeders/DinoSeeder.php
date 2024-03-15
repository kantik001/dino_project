<?php

namespace Database\Seeders;

use App\Models\Dino;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DinoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dinos = [
            'Диплодок',
            'Тиранозавр',
            'Птерадон',
            'Птерадактиль',
            'Мезозавр',
            'Анкилозавр',
            'Апатозавр',
            'Стегозавр',
            'Раптор',
            'Велоцираптор',
        ];

        foreach ($dinos as $dino) {
            Dino::firstOrCreate(['name' => $dino])->update([
                'price' => fake()->numberBetween(500, 1000),
                'description' => fake()->text(50),
                'categories' => fake()->century,
                'discount' => fake()->numberBetween(1, 490),
            ]);
        }
    }

}
