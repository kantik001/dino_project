<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PromocodeFilter extends AbstractFilter
{

    protected array $keys = [
        'code',
        'value_from',
        'value_to',
        'expired_from',
        'expired_to',
        'limit_from',
        'limit_to',
        'created_from',
        'created_to',
        'user_id'
    ];

    protected function code(Builder $builder, $value)
    {
        $builder->where('code', 'like', "%$value%");
    }
    protected function valueFrom(Builder $builder, $value)
    {
        $builder->where('value', '>=', $value);
    }

    protected function valueTo(Builder $builder, $value)
    {
        $builder->where('value', '<=', $value);
    }

    protected function expiredFrom(Builder $builder, $value)
    {
        $builder->where('expired_at', '>=', $value);
    }

    protected function expiredTo(Builder $builder, $value)
    {
        $builder->where('expired_at', '<=', $value);
    }

    protected function limitFrom(Builder $builder, $value)
    {
        $builder->where('limit_from', '>=', $value);
    }

    protected function limitTo(Builder $builder, $value)
    {
        $builder->where('limit_from', '<=', $value);
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



}
