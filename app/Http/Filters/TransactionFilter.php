<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class TransactionFilter extends AbstractFilter
{

    protected array $keys = [

        'value_from',
        'value_to',
        'status',
        'created_from',
        'created_to',
        'user_id',
        'order_id'
    ];


    protected function valueFrom(Builder $builder, $value)
    {
        $builder->where('value', '>=', $value);
    }

    protected function valueTo(Builder $builder, $value)
    {
        $builder->where('value', '<=', $value);
    }

    protected function status(Builder $builder, $value)
    {
        $builder->where('status', 'like', "%$value%");
    }

    protected function createdFrom(Builder $builder, $value)
    {
        $builder->where('created_at', '>=', $value);
    }

    protected function createdTo(Builder $builder, $value)
    {
        $builder->where('created_at', '<=', $value);
    }

    protected function userId(Builder $builder, $value)
    {
        $builder->whereRelation('user_id',  $value);
    }

    protected function orderId(Builder $builder, $value)
    {
        $builder->whereRelation('order_id',  $value);
    }



}
