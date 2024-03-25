<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\StoreRequest;
use App\Http\Requests\Admin\Order\UpdateRequest;
use App\Http\Requests\Filters\Order\IndexRequest;
use App\Http\Resources\Dino\DinoImageResource;
use App\Http\Resources\Dino\DinoResource;
use App\Http\Resources\Order\OrderResource;
use App\Models\Dino;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    //public function __construct(private OrderService $orderService) {  } - реализация через $this

    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $orders = Order::filter($data)->get();
        $orders = OrderResource::collection($orders)->resolve();
        return inertia('Admin/Order/Index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Order/Create');
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
        $order = OrderResource::make($order)->resolve();
        return inertia('Admin/Order/Edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Order $order)
    {
        $data = $request->validated();
        $order->update($data);
        return $order->fresh();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect(route('orders.index'));
    }
}
