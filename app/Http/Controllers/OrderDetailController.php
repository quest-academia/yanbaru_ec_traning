<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Product;


class OrderDetailController extends Controller
{
    public function showOrderDetail(Request $request )
    {

        $ordersHistory = OrderDetail::with('orders','Product.category','shipmentStatues')
        ->whereHas('orders', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->where('order_detail_number', 1) //1のところは$id
        ->where('shipment_status_id', '<>', 2)
        ->get();
        // dd($ordersHistory);
        $userInfo = User::find(Auth::id());
        $orderNumber = OrderDetail::where('order_id', 1) //$id order_detail_number
        ->select('order_detail_number')
        ->find(1);
        // dd($orderNumber);
        $subtotal = 0;
        $total = 0;

        //注文状態の判定
        $preparationOrder = Order::where('user_id', Auth::id())
        ->whereHas('orderDetails', function ($query) {
            $query->where([
                ['order_id', '=', '2'],//2のところは$id
                ['shipment_status_id', '=', '1'],
            ]);
        })
        ->get();
        // dd($shipment_status);
        //$shipment_status_flg = true なら発送済、false なら発送済
        $preparationOrderFlg = $preparationOrder->isEmpty() ? false : true;
        // dd($shipment_status_flg);
        return view('order/order_detail', compact('ordersHistory','userInfo', 'orderNumber','subtotal','total','preparationOrderFlg') );
    }

    public function edit()
    {
        // ログインしたユーザーと同じuser_idなら
        $ordersHistory = OrderDetail::whereHas('orders', function ($query) {
        $query->where('user_id', Auth::id());
        })

        ->where('shipment_status_id',  '=', '1')
        ->update(['shipment_status_id' => '2']);

        return redirect()->back();
    }
}
