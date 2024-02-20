<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promocode\StoreRequest;
use App\Http\Requests\Promocode\UpdateRequest;
use App\Http\Resources\Promocode\PromocodeResource;
use App\Models\Promocode;
use Illuminate\Http\Response;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PromocodeResource::collection(Promocode::all())->resolve();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $promocode = Promocode::create($data);
        return $promocode;
    }

    /**
     * Display the specified resource.
     */
    public function show(Promocode $promocode)
    {
        return PromocodeResource::make($promocode)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promocode $promocode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Promocode $promocode)
    {
        $data = $request->validated();
        $promocode->update($data);
        return $promocode->fresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return response(Response::HTTP_OK);
    }
}
