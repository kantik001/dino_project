<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dino extends Model
{
    use HasFactory;

    public function building() {

        return $this->belongsTo(Building::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
