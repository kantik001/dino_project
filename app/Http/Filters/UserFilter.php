<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{

    protected array $keys = [
        'name',
        'email',
        'created_from',
        'created_to',
    ];

    protected function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%$value%");
    }

    protected function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%$value%");
    }



    protected function createdFrom(Builder $builder, $value)
    {
        $builder->where('created_at', '>=', $value);
    }

    protected function createdTo(Builder $builder, $value)
    {
        $builder->where('created_at', '<=', $value);
    }

}
