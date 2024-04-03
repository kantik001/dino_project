<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferencesController extends Controller
{
    public function total()
    {
        return response()->json([
            'total' => auth()->user()->totalPriceInCart
        ]);
    }

}
