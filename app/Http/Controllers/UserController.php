<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        $user = User::create($data);
        return UserResource::make($user)->resolve();
    }

    public function destroy()
    {
        auth()->user()->delete();
        return response()->json([
            'message' => 'user successfully deleted'
        ], Response::HTTP_OK);
    }

}
