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
    private const SHIPMENT_STATUS_PREPARE = 1;
    private const SHIPMENT_STATUS_CANCEL = 2;

    public function show($id)
    {
        $orderDetail = OrderDetail::whereHas('order', function ($query) use($id) {
            $query->where('order_id', $id);
            })
            ->select('order_detail_number')
            ->first();
        // ログインしているユーザーの注文詳細、注文履歴で選んだ注文のキャンセル(注文状態)以外を取得
        $ordersHistory = OrderDetail::with('Product.category', 'shipmentStatus')
            ->whereHas('order', function ($query) {
                $query->where('user_id', Auth::id());
                })
            ->where('order_detail_number', $orderDetail->order_detail_number)
            ->where('shipment_status_id', '<>', self::SHIPMENT_STATUS_CANCEL)
            ->get();

        $userInfo = Auth::user();
        $subtotal = 0;
        $total = 0;

        //注文状態の判定
        $preparationOrder = OrderDetail::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id());
            })
            ->where('order_detail_number', $orderDetail->order_detail_number)
            ->where('shipment_status_id', '=', self::SHIPMENT_STATUS_PREPARE)
            ->get();
        //$shipment_status_flg = true なら準備中、false なら発送済
        $preparationOrderFlg = $preparationOrder->isEmpty() ? false : true;

        return view('order/order_detail', compact('ordersHistory', 'userInfo', 'orderDetail', 'subtotal', 'total', 'preparationOrderFlg') );
    }

    public function edit($id)
    {
        // ログインしたユーザーと同じuser_idなら選択した注文を準備中をキャンセルへ変更
        $ordersHistory = OrderDetail::whereHas('order', function ($query) {
            $query->where('user_id', Auth::id());
            })
            ->where('order_detail_number', '=', $id)
            ->where('shipment_status_id', '=', self::SHIPMENT_STATUS_PREPARE)
            ->update(['shipment_status_id' => self::SHIPMENT_STATUS_CANCEL]);

        return redirect()->back();;
    }
}
