<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class WelcomeController extends Controller
{
    public function index()
    {
        $plans = Plan::where('active', true)->orderBy('price')->get();

        return view('welcome', compact('plans'));
    }
}
