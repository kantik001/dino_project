<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dino\StoreRequest;
use App\Http\Requests\Admin\Dino\UpdateRequest;
use App\Http\Requests\Filters\Dino\IndexRequest;
use App\Http\Resources\Dino\DinoImageResource;
use App\Http\Resources\Dino\DinoResource;
use App\Models\Dino;
use Illuminate\Http\Response;

class DinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $dinos = Dino::filter($data)->paginate($data['per_page'],  ['*'], 'page', $data['page']);
        $dinos = DinoResource::collection($dinos);

        if($request->wantsJson()){
            return $dinos;
        }
        return inertia('Admin/Dino/Index', compact('dinos'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Dino $dino)
    {
        return DinoResource::make($dino)->resolve();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Admin/Dino/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $dino = Dino::create($data);
        return $dino;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dino $dino)
    {
        $dino = DinoResource::make($dino)->resolve();
        return inertia('Admin/Dino/Edit', compact('dino'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Dino $dino)
    {
        $data = $request->validated();
        $dino->update($data);
        return $dino->fresh();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dino $dino)
    {
        $dino->delete();
        return redirect(route('dinos.index'));
    }
}
