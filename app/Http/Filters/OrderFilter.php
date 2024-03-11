<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends AbstractFilter
{

    protected array $keys = [
        'total',
        'status',
        'created_from',
        'created_to',
        'user_id'
    ];

    protected function total(Builder $builder, $value)
    {
        $builder->where('total', 'like', "%$value%");
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
        $builder->where('user_id',  $value);
    }





}
