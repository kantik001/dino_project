<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function dinos()
    {
        return $this->morphedByMany(Dino::class, 'taggable');
    }


    public function buildings()
    {
        return $this->morphedByMany(Building::class, 'taggable');
    }
}
