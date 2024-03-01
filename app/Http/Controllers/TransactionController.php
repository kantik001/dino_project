<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\UpdateStatusRequest;
use App\Http\Requests\Transaction\StoreTypeDebetRequest;
use App\Http\Resources\Transaction\TransactionResource;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function storeTypeDebet(StoreTypeDebetRequest $request)
    {
        $data = $request->validated();
        $transaction = Transaction::create($data);
        return TransactionResource::make($transaction)->resolve();
    }


    public function updateStatusSuccess(Transaction $transaction, UpdateStatusRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $transaction->update([
                'status' => Transaction::STATUS_SUCCESS
            ]);

            $transaction->user()->profile()->update([
                'balance' => $transaction->user()->profile->balance + $data['amount'],
            ]);

            DB::commit();
        } catch (\Exception $exception) {
            $transaction->update([
                'status' => Transaction::STATUS_FAILED
//                'error_message' = $exception->getMessage()
            ]);
            DB::rollBack();
        }
        return Response::HTTP_OK;
    }

    public function updateStatusExternalFailed(Transaction $transaction)
    {
        $transaction->update([
            'status' => Transaction::STATUS_EXTERNAL_FAILED
        ]);
        return Response::HTTP_OK;
    }

}
