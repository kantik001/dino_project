<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\StoreRequest;
use App\Http\Requests\Admin\Profile\UpdateRequest;
use App\Http\Requests\Filters\Profile\IndexRequest;
use App\Http\Resources\Dino\DinoImageResource;
use App\Http\Resources\Dino\DinoResource;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Dino;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $profiles = Profile::filter($data)->get();
        $profiles = ProfileResource::collection($profiles)->resolve();
        return inertia('Admin/Profile/Index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Profile/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $profile = Profile::create($data);
        return $profile;
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        return ProfileResource::make($profile)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        $profile = ProfileResource::make($profile)->resolve();
        return inertia('Admin/Profile/Edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Profile $profile)
    {
        $data = $request->validated();
        $profile->update($data);
        return $profile->fresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return redirect(route('profiles.index'));
    }
}
