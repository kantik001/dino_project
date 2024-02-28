<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'is_dinos_in_cart' => 'required|boolean|in:1'
        ];
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'is_dinos_in_cart' => auth()->user()->dinosInCart->count() > 0
        ]);
    }


    public function messages()
    {
        return [
            'is_dinos_in_cart.in' => 'Корзина пуста'
        ];
    }

}
