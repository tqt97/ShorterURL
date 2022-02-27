<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $links = auth()->user()->links()->paginate(10);
        return view('dashboard', compact('links'));
    }
}
