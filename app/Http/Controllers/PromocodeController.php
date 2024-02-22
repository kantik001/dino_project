<?php

namespace App\Http\Controllers;

use App\Http\Requests\Promocode\UpdateUserRequest;
use App\Http\Resources\Promocode\PromocodeResource;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function updateUser(UpdateUserRequest $request)
    {
        $data = $request->validationData();

        $data['promocode']->update([
            'user_id' => auth()->id()
        ]);

        return PromocodeResource::make($data['promocode'])->resolve();
    }

}
