<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DestroyDinoInCartRequest;
use App\Http\Requests\User\StoreDinoToCartRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateDinoToCartRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\StoreUserResource;
use App\Http\Resources\User\StoreWithTokenUserResource;
use App\Http\Resources\User\UpdateUserResource;
use App\Models\User;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        $user = User::create($data);
        return StoreWithTokenUserResource::make($user)->resolve();
    }

    public function update(UpdateRequest $request)
    {
        $data = $request->validated();
        auth()->user()->update($data);
        return UpdateUserResource::make(auth()->user())->resolve();

    }

    public function destroy()
    {
        auth()->user()->delete();
        return response()->json([
            'message' => 'user successfully deleted'
        ], Response::HTTP_OK);
    }


    public function storeDinoToCart(StoreDinoToCartRequest $request)
    {
        $data = $request->validated();
        auth()->user()->dinosInCart()->syncWithoutDetaching([$data['dino_id'] => $data]);
        return response()->json(['message' => 'Продукт добавлен', 'total' => User::find('user_id', auth()->id())->first()->totalPriceInCart], Response::HTTP_OK);

    }

    public function updateDinoInCart(UpdateDinoToCartRequest $request)
    {
        $data = $request->validated();
        auth()->user()->dinosInCart()->updateExistingPivot($data['dino_id'], ['qty' => $data['qty']]);
        return response()->json(['message' => 'Количество дино изменено'], Response::HTTP_OK);
    }

    public function destroyDinoInCart(DestroyDinoInCartRequest $request)
    {
        $data = $request->validated();
        auth()->user()->dinosInCart()->detach($data['dino_id']);
        return response()->json(['message' => 'Дино удален'], Response::HTTP_OK);
    }

}
