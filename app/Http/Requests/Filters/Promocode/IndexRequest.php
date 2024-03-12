<?php

namespace App\Http\Requests\Filters\Promocode;

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
            'code'=> 'nullable|string',
            'value_from'=> 'nullable|numeric',
            'value_to'=> 'nullable|numeric',
            'expired_from'=> 'nullable|date_format:Y-m-d',
            'expired_to'=> 'nullable|date_format:Y-m-d',
            'limit_from'=> 'nullable|numeric',
            'limit_to'=> 'nullable|numeric',
            'created_from'=> 'nullable|date_format:Y-m-d',
            'created_to'=> 'nullable|date_format:Y-m-d',
            'user_id' => 'nullable|integer|exists:users,id'
        ];
    }
}
