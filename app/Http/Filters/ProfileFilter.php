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

    protected function login(Builder $builder, $value)
    {
        $builder->where('login', 'like', "%$value%");
    }

    protected function firstName(Builder $builder, $value)
    {
        $builder->where('first_name', 'like', "%$value%");
    }

    protected function lastName(Builder $builder, $value)
    {
        $builder->where('last_name', 'like', "%$value%");
    }

    protected function gender(Builder $builder, $value){

        $builder->where('gender', 'like',"%$value%");
    }


    protected function birthedFrom(Builder $builder, $value)
    {
        $builder->where('birthed_at', '>=', $value);
    }

    protected function birthedTo(Builder $builder, $value)
    {
        $builder->where('birthed_at', '<=', $value);
    }

    protected function balanceFrom(Builder $builder, $value)
    {
        $builder->where('balance', '>=', $value);
    }

    protected function balanceTo(Builder $builder, $value)
    {
        $builder->where('balance', '<=', $value);
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
