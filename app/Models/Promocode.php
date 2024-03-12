<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    protected $casts = [
        'expired_at' => 'date',
        ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getFormatValueAttribute()
    {
        return number_format($this->value, 2);
    }
}
