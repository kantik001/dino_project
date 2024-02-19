<?php

namespace App\Mappers;

use Illuminate\Database\Eloquent\Collection;

class IndexMapper
{
    public static function index(Collection $orders)
    {
        $result = [];

        foreach ($orders as $order) {
            $result[$order->total][] = $order;
        }

        return $result;

    }

}
