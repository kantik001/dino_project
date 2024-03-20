<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index()
    {
        return inertia('Vue/Index');
    }
}
