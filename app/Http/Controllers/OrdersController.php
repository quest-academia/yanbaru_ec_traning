<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function show(Request $request)
    {
        //3ヶ月前の履歴表示：termFlg＝＞false, 全件履歴表示：termFlg＝＞true
        $termFlg = $request->input('termFlg') == 'false' ? false : true;

        //注文履歴情報取得
        $orders = Order::where('user_id', Auth::id())
                        ->with('orderDetails', 'user')
                        ->when(!($termFlg), function ($query) {
                            return $query->where('order_date', '>', (Carbon::now()->subMonth(3)));
                        })
                        ->orderBy('order_date', 'desc')
                        ->paginate(15);

        //注文状態が発送済：preparationFlg ＝ true, 準備中：preparationFlg ＝ false,
        $preparationFlg = false;//falseの場合は発送済
        foreach ($orders as $order) {
            foreach ($order->orderDetails as $order_detail) {
                if ($order_detail->shipment_status_id == "1") {//shipment_status_id = 1 は 注文状態：'準備中'
                    $preparationFlg = true;//trueの場合は準備中
                    break;
                }
            }
        }

        return view('order/order_history', compact('orders', 'termFlg', 'preparationFlg'));
    }
}
