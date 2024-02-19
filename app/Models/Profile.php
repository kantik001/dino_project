<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    const MALE = 1;
    const FEMALE = 2;

    const GENDERS = [
        self::MALE => 'мужской',
        self::FEMALE => 'женский',
    ];

    protected $casts = [
        'birthed_at' => 'date',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getFormatBalanceAttribute()
    {
        return number_format($this->balance, 2);
    }
}
