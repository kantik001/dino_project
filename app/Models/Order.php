<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasFilter;

    const STATUS_CREATED = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_FAILED = 3;

    const STATUSES = [
        self::STATUS_CREATED => 'создан',
        self::STATUS_SUCCESS => 'оплачен',
        self::STATUS_FAILED => 'ошибка',

    ];

    public function dinos()
    {
        return $this->belongsToMany(Dino::class, 'dino_user', 'order_id', 'dino_id')
            ->withPivot('qty');
    }

    public function getTotalPriceAttribute(): int
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total += (int) $product->price * $product->pivot->qty;
        }
        return $total;
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function scopeFailedOrders(Builder $builder, $from, $to)
    {
        return $builder->where('status', Order::STATUS_FAILED)
            ->where('total', '>', $from)
            ->where('total', '<', $to);
    }

    public function getFormatTotalAttribute()
    {
        return number_format($this->total, 2);
    }

    public function getStatusTitleAttribute()
    {
        return self::STATUSES[$this->status];
    }
}
