<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\ConfirmRequest;
use App\Http\Requests\Order\DestroyDinoRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\StoreTransactionRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Models\Transaction;
use App\Services\OrderService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(auth()->user()->orders)->resolve();
    }

    public function store(StoreRequest $request)
    {
        //$data = $request->validated();
        $order = OrderService::storeByUser();
        return OrderResource::make($order->fresh())->resolve();
    }

    public function show(Order $order)
    {
        return OrderResource::make($order)->resolve();
    }

    public function storeTransaction(Order $order, StoreTransactionRequest $request)
    {
        $data = $request->validationData();
        // Создать со статусом 1
        try {
            DB::beginTransaction();
            // Обработать и статус 2
            $transaction = $order->transactions()->create($data);
            $amount = $order->dinos()->sum('price');
            $transaction->user()->profile()->update([
                'balance' => $transaction->user()->profile->balance - $amount,
            ]);

            $order->update([
                'status' => Order::STATUS_SUCCESS
            ]);

            $order = $order->fresh();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            // Тут поставить статус 3
        }
        return OrderResource::make($order)->resolve();
    }


    public function confirm(Order $order, ConfirmRequest $request)
    {

        Transaction::create([
            'type'  => Transaction::TYPE_CREDIT,
            'amount'    => $order->user->orderDinos($order)->get()->sum(function ($dino) {
                return $dino->price * $dino->pivot->quantity;
            }),
            'user_id'   => auth()->id(),
            'order_id'  => $order->id,
        ]);

        return OrderResource::make($order)->resolve();
    }

    public function updateDino(Order $order, \App\Http\Requests\Order\UpdateDinoRequest $request)
    {
        $data = $request->validated();
        $order = OrderService::updateByUser($order, $data);
        return OrderResource::make($order)->resolve();
    }

    public function destroyDino(Order $order, DestroyDinoRequest $request)
    {
        $data = $request->validated();
        $order = OrderService::destroyDino($order, $data);
        return OrderResource::make($order)->resolve();
    }

    public function destroy(Order $order)
    {
        OrderService::destroyByUser($order);
        return Response::HTTP_OK;
    }



}
