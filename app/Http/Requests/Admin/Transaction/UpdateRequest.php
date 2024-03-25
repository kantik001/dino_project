<?php

namespace App\Http\Requests\Admin\Transaction;

use App\Models\Transaction;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $statuses = implode(',', array_keys(Transaction::STATUSES));
        return [
            'value'=>'required|numeric',
            'status' => 'nullable|integer|in:' . $statuses,
            'user_id'=>'required|integer|exists:users,id',
            'order_id'=>'required|integer|exists:orders,id',
        ];
    }
}
