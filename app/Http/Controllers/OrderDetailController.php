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
    public function show($id)
    {
        $orderNumber = OrderDetail::whereHas('orders', function ($query) use($id) {
            $query->where('order_id', $id);
        })
        ->select('order_detail_number')
        ->first();
        // ログインしているユーザーの注文詳細、注文履歴で選んだ注文のキャンセル(注文状態)以外を取得
        $ordersHistory = OrderDetail::with('Product.category','shipmentStatues')
        ->whereHas('orders', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->where('order_detail_number', $orderNumber->order_detail_number)
        ->where('shipment_status_id', '<>', 2)
        ->get();

        $userInfo = User::find(Auth::id());
        $subtotal = 0;
        $total = 0;

        //注文状態の判定
        $preparationOrder = OrderDetail::whereHas('orders', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->select('order_detail_number')
        ->where('shipment_status_id', '=', 1)
        ->get();

        //$shipment_status_flg = true なら準備中、false なら発送済
        $preparationOrderFlg = $preparationOrder->isEmpty() ? false : true;

        return view('order/order_detail', compact('ordersHistory','userInfo', 'orderNumber','subtotal','total','preparationOrderFlg') );
    }

    public function edit($id)
    {
        // ログインしたユーザーと同じuser_idなら選択した注文を準備中をキャンセルへ変更
        $ordersHistory = OrderDetail::whereHas('orders', function ($query) {
        $query->where('user_id', Auth::id());
        })
        ->where('order_detail_number',  '=', $id)
        ->where('shipment_status_id',  '=', '1')
        ->update(['shipment_status_id' => '2']);

        return redirect()->back();;
    }
}
