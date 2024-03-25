<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Transaction\StoreRequest;
use App\Http\Requests\Admin\Transaction\UpdateRequest;
use App\Http\Requests\Filters\Transaction\IndexRequest;
use App\Http\Resources\Dino\DinoResource;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $transactions = Transaction::filter($data)->get();
        $transactions = TransactionResource::collection($transactions)->resolve();
        return inertia('Admin/Transaction/Index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Transaction/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $transaction = Transaction::create($data);
        return $transaction;
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return TransactionResource::make($transaction)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $transaction = TransactionResource::make($transaction)->resolve();
        return inertia('Admin/Transaction/Edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Transaction $transaction)
    {
        $data = $request->validated();
        $transaction->update($data);
        return $transaction->fresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect(route('transactions.index'));
    }
}
