<?php

namespace App\Http\Requests\Filters\Order;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'total'=> 'nullable|string',
            'status'=> 'nullable|string',
            'created_from'=> 'nullable|date_format:Y-m-d',
            'created_to'=> 'nullable|date_format:Y-m-d',
            'user_id' => 'nullable|integer|exists:users,id'
        ];
    }
}
