<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDinoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'dino_id'  => 'required|integer|exists:dino_user,dino_id',
            'quantity'  => 'required|integer|min:1',
            'status_is_new' => 'required|boolean|in:1',
        ];
    }

    public function prepareForValidation()
    {

        return $this->merge([
            'status_is_new' => $this->route('order')->status == 1,
        ]);
    }

    public function messages()
    {
        return [
            'status_is_new' => 'Нельзя отредактировать заказ',
        ];
    }

}
