<?php

namespace App\Http\Requests\Order;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => 'required|numeric',
            'type' => 'nullable|integer|in:' . Transaction::TYPE_CREDIT,
        ];
    }

    protected function passedValidation()
    {
        return $this->merge([
//            'amount' => $this->amount,
//            'type' => $this->type,
            'status' => Transaction::STATUS_SUCCESS
        ]);
    }

}
