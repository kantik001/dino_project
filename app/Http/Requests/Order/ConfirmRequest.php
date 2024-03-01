<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'has_transaction'  => 'required|bool|in:1'
        ];
    }

    public function prepareForValidation()
    {

        return $this->merge([
            'has_transaction'   => is_null($this->route('order')->transaction),
        ]);
    }

}
