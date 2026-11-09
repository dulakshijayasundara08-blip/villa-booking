<?php

namespace App\Http\Controllers;

use App\Models\Room;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::orderBy('id')->take(3)->get();

        return view('home', compact('rooms'));
    }
}