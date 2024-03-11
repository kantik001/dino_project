<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProfileFilter extends AbstractFilter
{

    protected array $keys = [
        'login',
        'first_name',
        'last_name',
        'gender',
        'birthed_to',
        'birthed_from',
        'created_to',
        'created_from',
        'balance_to',
        'balance_from',
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
        $builder->whereRelation('user_id',  $value);
    }



}
