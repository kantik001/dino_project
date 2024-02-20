<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    //public function __construct(private OrderService $orderService) {  } - реализация через $this

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return OrderResource::collection(Order::all())->resolve();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $order = Order::create($data);
        return $order;
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return OrderResource::make($order)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();
        //$order = $this->orderService->update($order, $data); - другой подход
        $order = OrderService::update($order, $data);
        return OrderResource::make($order);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response(Response::HTTP_OK);
    }
}
