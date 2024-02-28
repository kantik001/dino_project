<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateStatusRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $order = Order::create([
                'user_id' => auth()->id(),
            ]);
            auth()->user()->dinosInCart()->updateExistingPivot(auth()->user()->dinosInCart->pluck('id'), [
                'order_id' => $order->id
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

        return OrderResource::make($order)->resolve();
    }

    public function updateStatus(Order $order, UpdateStatusRequest $request)
    {
        $data = $request->validated();
        $order->update($data);
        $order = $order->fresh();
        return OrderResource::make($order)->resolve();
    }


    public function updateDinos()
    {

    }

}
