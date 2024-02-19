<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public static function update(Order $order, array $data):Order
    {
        $order->update($data);
        return $order->fresh();
    }
}
