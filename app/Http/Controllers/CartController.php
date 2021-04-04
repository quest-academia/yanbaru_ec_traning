<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {   
        dd(Auth::user());
        return view('cart.cart_list');
    }
}
