<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Product;
use App\OrderDetail;

class OrdersController extends Controller
{
    public function getHistory(Request $request)
    {
        //ログイン中のユーザーIDをもとに注文情報を取得する
        $orderInformations = Order::where('user_id', Auth::id())->with(
            ['user', 'orderDetails.shipmentStatuses'])->orderBy('order_date', 'desc')->paginate(3);
            
        //注文状態の判定を行うため、上記で取得されるレコードの中に”準備中”の商品があれば "1" を出力し、無ければ "0" を出力する。
        $InPreparation = Order::where('user_id' , Auth::id())
            ->where('order_number', $request->detail_number)->whereHas('orderDetails', function($query){
                $query->where('shipment_status_id', '=', '1');})
            ->get();        
            
                if($InPreparation->isEmpty()){
                    $checkInPreparation = 0;
                }else{
                    $checkInPreparation = 1;
                }

        return view('order_history', compact('orderInformations', 'checkInPreparation'));
    }
    
    public function get3MonthHistory (Request $request)
    {
        //直近３ヶ月分の注文を取得する
        $past_3_month = today()->subMonth(3);
        $orderInformations = Order::where('user_id', Auth::id())
            ->with(['user', 'orderDetails.shipmentStatuses'])
            ->where('order_date', '>', $past_3_month)
            ->orderBy('order_date', 'desc')
            ->paginate(3);

        //注文状態の判定を行うため、上記で取得されるレコードの中に”準備中”の商品があれば "1" を出力し、無ければ "0" を出力する。
        $InPreparation = Order::where('user_id' , Auth::id())
            ->where('order_number', $request->detail_number)->whereHas('orderDetails', function($query){
                $query->where('shipment_status_id', '=', '1');})
            ->get();

                if($InPreparation->isEmpty()){
                    $checkInPreparation = 0;
                }else{
                    $checkInPreparation = 1;
                }

        return view('recently_orders', compact('orderInformations', 'checkInPreparation'));
    }

    public function orderDetail (Request $request)
    {
        //小計の計算用の定数を呼出し
        $subTotal = config('order.const.SUB_TOTAL');
        //合計の計算用の定数を呼出し
        $total = config('order.const.TOTAL');

        //ログイン中のユーザーIDと注文履歴画面で選択された注文番号で検索し各テーブルの情報を一括取得。
        $orderDetailData = Order::where('user_id' , Auth::id())->where('order_number', $request->detail_number)->with(
            ['user' , 'orderDetails.products' , 'orderDetails.shipmentStatuses' , 
                'orderDetails.products.saleStatus' , 'orderDetails.products.productStatus' , 
                    'orderDetails.products.category'])->paginate(3);
        
        //注文状態の判定を行うため、上記で取得されるレコードの中に”準備中”の商品があれば "1" を出力し、無ければ "0" を出力する。
        $InPreparation = Order::where('user_id' , Auth::id())
            ->where('order_number', $request->detail_number)->whereHas('orderDetails', function($query){
                $query->where('shipment_status_id', '=', '1');})
            ->get();

                    if($InPreparation->isEmpty()){
                        $checkInPreparation = 0;
                    }else{
                        $checkInPreparation = 1;
                    }

        return view('order_detail',compact('orderDetailData', 'checkInPreparation', 'total', 'subTotal'));
    }

    //注文のキャンセル。発送状態が準備中ならキャンセルにできる。
    public function cancelOrder(Request $request)
    {
        if(Auth::id() === (int)$request->userId){
        $order = Order::where('user_id' , Auth::id())
            ->find($request->orderId);
        
        $order->orderDetails()
            ->where('shipment_status_id', '=', '1')
            ->update(['shipment_status_id' => 4]);

        return redirect('orders');
        }else{
        return redirect('orders');
        }
    }
}