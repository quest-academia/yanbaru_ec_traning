<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class OrdersController extends Controller
{

    public function getHistory(Request $request)
    {
        $order_information = Order::where('user_id', Auth::id())->with(
            ['user', 'orderDetails.shipmentStatuses'])->orderBy('order_date', 'desc')->paginate(3);

        return view('order_history', compact('order_information'));
    }
    
    public function get3Month (Request $request)
    {
        $past_3_month = today()->subMonth(3);
        $order_information = Order::where('user_id', Auth::id())->with(
            ['user', 'orderDetails.shipmentStatuses'])->where('order_date', '>', $past_3_month)->orderBy('order_date', 'desc')->paginate(3);
        
            return view('recently_orders', compact('order_information'));
    }

    public function orderDetail (Request $request)
    {
        $data = Order::where('user_id', Auth::id())->with(
            ['user', 'orderDetails.shipmentStatuses'])->where('order_detail_number', $request->id)->first();
        
            return view('order_detail', compact('data'));
    }
}