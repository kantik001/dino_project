<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Building\StoreRequest;
use App\Http\Requests\Building\UpdateRequest;
use App\Http\Resources\Building\BuildingResource;
use App\Models\Building;
use Illuminate\Http\Response;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BuildingResource::collection(Building::all())->resolve();
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
        $building = Building::create($data);
        return $building;
    }

    /**
     * Display the specified resource.
     */
    public function show(Building $building)
    {
        return BuildingResource::make($building)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Building $building)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Building $building)
    {
        $data = $request->validated();
        $building->update($data);
        return $building->fresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Building $building)
    {
        $building->delete();
        return response(Response::HTTP_OK);
    }
}
