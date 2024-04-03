<?php

namespace App\Http\Controllers;

use App\Http\Resources\Dino\DinoResource;
use App\Models\Dino;
use Illuminate\Http\Request;

class DinoController extends Controller
{
    public function index()
    {
        $dinos = Dino::all();
        $dinos = DinoResource::collection($dinos)->resolve();
        $total = auth()->user()->totalPriceInCart;
        return inertia('Dino/Index', compact('dinos', 'total'));
    }

}
