<?php

namespace App\Http\Controllers;

use App\Http\Requests\DinoImageRequest;
use App\Http\Resources\Dino\DinoResource;
use App\Models\DinoImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DinoImageController extends Controller
{
    public function store(DinoImageRequest $request)
    {
        $path = Storage::disk('public')->put('/images', $request['image']);
        $image = DinoImage::create([
            'path' => $path,
            'user_id' => auth()->id()
        ]);
        return new DinoResource($image);
    }
}
