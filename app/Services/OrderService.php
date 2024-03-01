<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public static function store(array $data): Order
    {
        return Order::create($data);
    }

    public static function update(Order $order, array $data): Order
    {
        $order->update($data);
        return $order->fresh();
    }

    public static function storeByUser(): Order
    {
        try {
            DB::beginTransaction();
            $order = Order::create([
                'user_id'   => auth()->id(),
            ]);

            auth()->user()->dinosInCart()->updateExistingPivot(auth()->user()->dinosInCart()->pluck('id'),[
                'order_id'  => $order->id,
            ]);
            DB::commit();
        }catch(\Exception $exception){
            DB::rollBack();
        }
        return isset($order)?$order->fresh():[];
    }

    public static function updateByUser(Order $order, array $data): Order
    {
        try {
            DB::beginTransaction();
            auth()->user()->orderDinos($order)->syncWithoutDetaching([$data['dino_id']=> [
                'quantity'  => $data['quantity'],
            ]]);
            DB::commit();
        }catch(\Exception $exception) {
            DB::rollBack();
        }
        return $order->fresh();
    }

    public static function destroyByUser(Order $order): void
    {
        try {
            DB::beginTransaction();
            auth()->user()->orderDinos($order)->sync([]);
            $order->delete();
            DB::commit();
        }catch(\Exception $exception) {
            DB::rollBack();
        }
    }


    public static function destroyDino(Order $order, array $data): Order
    {
        auth()->user()->orderDinos($order)->detach($data['dino_id']);
        return $order;
    }

}
