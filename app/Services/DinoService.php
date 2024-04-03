<?php

namespace App\Services;

use App\Models\Dino;

class DinoService
{
    public static function store(array $data): Dino
    {
        return Dino::create($data);
    }

    public static function update(Dino $dino, array $data): Dino
    {
        $dino->update($data);
        return $dino->fresh();
    }


}
