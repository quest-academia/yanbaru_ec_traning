<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrderDetail()
    {
        return view('order/order_detail');
    }
}
