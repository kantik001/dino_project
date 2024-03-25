<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    const TYPE_DEBET = 1;
    const TYPE_CREDIT = 2;

    const STATUS_CREATED = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_FAILED = 3;
    const STATUS_EXTERNAL_FAILED = 4;

    const TYPES = [
        self::TYPE_DEBET => 'Пополнение',
        self::TYPE_CREDIT => 'Оплата услуг',
    ];

    const STATUSES = [
        self::STATUS_CREATED => 'Создана',
        self::STATUS_SUCCESS => 'Успешна',
        self::STATUS_FAILED => 'Ошибка',
        self::STATUS_EXTERNAL_FAILED => 'Ошибка у платежки',
    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function promocode()
    {
        return $this->belongsTo(Promocode::class);
    }

    public function getFormatValueAttribute()
    {
        return number_format($this->value, 2);
    }
}
