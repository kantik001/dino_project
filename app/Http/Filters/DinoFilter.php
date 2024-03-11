<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class DinoFilter extends AbstractFilter
{

    protected array $keys = [
        'name',
        'description',
        'price_from',
        'price_to',
        'categories',
        'discount_from',
        'discount_to',
        'created_from',
        'created_to',
    ];

    protected function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%$value%");
    }

    protected function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%$value%");
    }


    protected function priceFrom(Builder $builder, $value)
    {
        $builder->where('price', '>=', $value);
    }

    protected function priceTo(Builder $builder, $value)
    {
        $builder->where('price', '<=', $value);
    }

    protected function categories(Builder $builder, $value)
    {
        $builder->where('categories', 'like', "%$value%");
    }

    protected function discountFrom(Builder $builder, $value)
    {
        $builder->where('discount', '>=', $value);
    }

    protected function discountTo(Builder $builder, $value)
    {
        $builder->where('discount', '<=', $value);
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
