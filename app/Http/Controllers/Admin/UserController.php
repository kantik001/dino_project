<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Http\Requests\Filters\User\IndexRequest;
use App\Http\Resources\Dino\DinoResource;
use App\Http\Resources\User\StoreUserResource;
use App\Http\Resources\User\UserResource;
use App\Models\Dino;
use App\Models\User;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $users = User::filter($data)->get();
        $users = UserResource::collection($users)->resolve();
        return inertia('Admin/User/Index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validationData();
        $user = User::create($data);
        return StoreUserResource::make($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return StoreUserResource::make($user)->resolve();
    }

    public function create()
    {
        return inertia('Admin/User/Create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $data = $request->validationData();
        $user->update($data);
        $user = $user->fresh();
        return StoreUserResource::make($user);
    }

    public function edit(User $user)
    {
        $user = UserResource::make($user)->resolve();
        return inertia('Admin/User/Edit', compact('user'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'));
    }
}
