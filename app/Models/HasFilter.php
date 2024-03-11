<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, array $data)
    {
        $className = 'App\Http\Filters\\' . class_basename($this) . 'Filter';
        $filter = app()->make($className);
        return $filter->apply($builder, $data);
    }


}
