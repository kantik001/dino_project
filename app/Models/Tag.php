<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function dinos()
    {
        return $this->morphedByMany(Dino::class, 'taggable');
    }


    public function buildings()
    {
        return $this->morphedByMany(Building::class, 'taggable');
    }
}
