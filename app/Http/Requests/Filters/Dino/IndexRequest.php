<?php

namespace App\Http\Requests\Filters\Dino;

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
            'name'=> 'nullable|string',
            'description'=> 'nullable|string',
            'price_from'=> 'nullable|numeric',
            'price_to'=> 'nullable|numeric',
            'categories'=> 'nullable|string',
            'discount_from'=> 'nullable|numeric',
            'discount_to'=> 'nullable|numeric',
            'created_from'=> 'nullable|date_format:Y-m-d',
            'created_to'=> 'nullable|date_format:Y-m-d',

        ];
    }
}
