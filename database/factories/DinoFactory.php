<?php

namespace Database\Factories;

use App\Models\Dino;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dino>
 */
class DinoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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



        $names = [];

        foreach ($dinos as $dino) {
            $names[] = Dino::firstOrCreate($dino)->name;
        }

        $name = join(',',$names);

        return [
            'name' => $name->unique(),
        ];
    }
}
