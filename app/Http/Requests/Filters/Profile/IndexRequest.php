<?php

namespace App\Http\Requests\Filters\Profile;

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
            'login'=> 'nullable|string',
            'first_name'=> 'nullable|string',
            'last_name'=> 'nullable|string',
            'gender'=> 'nullable|string',
            'birthed_from'=> 'nullable|date_format:Y-m-d',
            'birthed_to'=> 'nullable|date_format:Y-m-d',
            'balance_from'=> 'nullable|numeric',
            'balance_to'=> 'nullable|numeric',
            'created_from'=> 'nullable|date_format:Y-m-d',
            'created_to'=> 'nullable|date_format:Y-m-d',
            'user_id' => 'nullable|integer|exists:users,id'
        ];
    }
}
