<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Route to Home
     */
    public function index()
    {
        return view('home');
    }
}
