<?php

namespace App\Http\Requests\Admin\Promocode;

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
            'code'=>'required|string',
            'value'=>'required|numeric',
            'expired_at'=>'required|date',
            'limit_from'=>'required|integer',
            'user_id'=>'required|integer|exists:users,id',
        ];
    }
}
