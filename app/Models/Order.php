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

    const STATUS_CREATED = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_FAILED = 3;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function transactions() {
        return $this->hasOne(Transaction::class);
    }

    public function scopeFailedOrders(Builder $builder, $from, $to)
    {
        return $builder->where('status', Order::STATUS_FAILED)
            ->where('total', '>', $from)
            ->where('total', '<', $to);
    }
}
