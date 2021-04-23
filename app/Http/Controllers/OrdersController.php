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
        //3ヶ月前の履歴表示：term_flg＝＞false, 全件履歴表示：term_flg＝＞true
        $term_flg = $request->input('term_flg') == 'false' ? false : true;
        
        //注文履歴情報取得
        $orders = Order::where('user_id', Auth::id())
                        ->with('orderDetails', 'users')
                        ->when(!($term_flg), function ($query) {
                            return $query->where('order_date', '>', (Carbon::now()->subMonth(3)));
                        })
                        ->orderBy('order_date', 'desc')
                        ->paginate(15);
        
        //注文状態が発送済：shipment_status_flg ＝ true, 準備中：shipment_status_flg ＝ false,
        $shipment_status_flg = false;//falseの場合は発送済
        foreach ($orders as $order) {
            foreach ($order->orderDetails as $order_detail) {
                if ($order_detail->shipment_status_id == "1") {//shipment_status_id = 1 は 注文状態：'準備中'
                    $shipment_status_flg = true;//trueの場合は準備中
                    break;
                }
            }
        }

        return view('order/order_history', compact('orders', 'term_flg', 'shipment_status_flg'));
    }
}
