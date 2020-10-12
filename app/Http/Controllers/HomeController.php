<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $locations = Location::all();

        return view('home', compact('locations'));
    }
}
