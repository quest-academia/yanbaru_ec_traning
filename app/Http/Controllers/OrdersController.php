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
        $InPreparation = Order::where('user_id' , Auth::id())->where('order_number', $request->detail_number)->whereHas('orderDetails', function($query){
            $query->where('shipment_status_id', '=', '1');})->get();        
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
        $orderInformations = Order::where('user_id', Auth::id())->with(
            ['user', 'orderDetails.shipmentStatuses'])->where('order_date', '>', $past_3_month)->orderBy('order_date', 'desc')->paginate(3);

        //注文状態の判定を行うため、上記で取得されるレコードの中に”準備中”の商品があれば "1" を出力し、無ければ "0" を出力する。
        $InPreparation = Order::where('user_id' , Auth::id())->where('order_number', $request->detail_number)->whereHas('orderDetails', function($query){
            $query->where('shipment_status_id', '=', '1');})->get();        
                if($InPreparation->isEmpty()){
                    $checkInPreparation = 0;
                }else{
                    $checkInPreparation = 1;
                }

            return view('recently_orders', compact('orderInformations', 'checkInPreparation'));
    }
}