<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;

class OrdersController extends Controller
{

    public function orderHistory(Request $request)
    {
        $orderNumber = 0;
        $orderInformation = Order::where('user_id' , Auth::id())->with(
            ['user' , 'orderDetails.shipmentStatuses'])->orderBy('order_date', 'desc')->paginate(3);

        return view('order_history',compact('orderNumber' , 'orderInformation'));
    }
    
    public function recentlyOrders (Request $request)
    {
        $orderNumber = 0;
        $past3Month = today()->subMonth(3);
        $orderInformation = Order::where('user_id' , Auth::id())->with(
            ['user' , 'orderDetails.shipmentStatuses'])->where('order_date', '>', $past3Month)->orderBy('order_date', 'desc')->paginate(3);
        
            return view('recently_orders',compact('orderNumber' , 'orderInformation'));
    }

    public function orderDetail (Request $request)
    {
        $orderNumber = 0;
        $data = Order::where('user_id' , Auth::id())->with(
            ['user' , 'orderDetails.shipmentStatuses'])->where('order_detail_number', $request->id)->first();
        
            return view('order_detail',compact('orderNumber' , 'data'));
    }
}