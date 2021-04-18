<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function showOrderDetail()
    {
        return view('order/order_detail');
    }
}
