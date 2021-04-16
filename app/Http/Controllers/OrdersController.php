<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
// use App\Models\OrderDetail;
// use App\Models\ShipmentStatus;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function show(Request $request)
    {
        // $data = Auth::id();
        // dd($data);
        // $user_info = User::first();//first()の中はAuth::id()が入る
        
        $set_day_before = 7;
        $set_month_before = 3;
        $days_before = Carbon::now()->subDay($set_day_before);
        $months_before = Carbon::now()->subMonth($set_month_before);

        dd($request->order_term);
        // if ($id == 1) {
        //     $limit_data = $days_before;
        // } elseif ($id == 2) {
        //     $limit_data = $months_before;
        // } else{
        //     $limit_data = null;
        // };

        $orders_details = Order::with('orderDetails.shipmentStatues', 'users')
        ->where([
            ['user_id', '=', '1'],//1のところはAuth::id()
            ['order_date', '>=', '$days_before'],//$limit_data
        ])->get();
        // $data = $order_details->user_id;
        // dd($data);
        // dd($orders_details);
        // dd($user_info);
        return view('order/order_history', compact('orders_details'));
        // return view('order/order_history', contact('user_info'));
    }
}
