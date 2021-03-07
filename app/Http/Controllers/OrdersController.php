<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Product;

class OrdersController extends Controller
{

    public function getHistory(Request $request)
    {
        $orderInformations = Order::where('user_id', Auth::id())->with(
            ['user', 'orderDetails.shipmentStatuses'])->orderBy('order_date', 'desc')->paginate(3);

        return view('order_history', compact('orderInformations'));
    }
    
    public function get3MonthHistory (Request $request)
    {
        $past_3_month = today()->subMonth(3);
        $orderInformations = Order::where('user_id', Auth::id())->with(
            ['user', 'orderDetails.shipmentStatuses'])->where('order_date', '>', $past_3_month)->orderBy('order_date', 'desc')->paginate(3);
        
            return view('recently_orders', compact('orderInformations'));
    }

    public function orderDetail (Request $request)
    {
        $orderNumber = 0;
        $order_detail_data = Order::where('user_id' , Auth::id())->with(
            ['user' , 'orderDetails.products' , 'orderDetails.shipmentStatuses' , 
                'orderDetails.products.saleStatus' , 'orderDetails.products.productStatus' , 
                    'orderDetails.products.category'])->where('order_number', $request->id)->paginate(3);

                    foreach ($order_detail_data as $detail_data){
                    }
                        $notReady = 0;
                        $orderDetails = $detail_data->orderDetails;
                    if(isset($orderDetails)){
                            $notReady = 0;
                            $ready = 0;
                            $shipped = 0;
                            $cancel = 0;
                            $orderDetailCount = 0;
                            foreach( $detail_data->orderDetails as $orderDetail ){
                                $shipmentStatusId = $orderDetail->shipment_status_id;
                                if($shipmentStatusId === 2){
                                    $ready += 1;
                                }elseif($shipmentStatusId === 3){
                                    $shipped += 1;
                                }elseif($shipmentStatusId === 4){
                                    $cancel += 1;
                                }
                            }
                            $orderDetailCount = $detail_data->orderDetails->count();
                        }

                        if($orderDetailCount === $shipped){
                                $notReady = 0;
                            $ship_status = "発送済";
                        }elseif($orderDetailCount === $ready) {
                                $notReady = 0;
                            $ship_status = "発送準備完了"; 
                        }elseif($orderDetailCount === $cancel){
                                $notReady = 0;
                            $ship_status = "キャンセル";
                        }else{
                            $notReady = 1;
                            $ship_status = "準備中";
                        }

        //dd($order_detail_data);
        return view('order_detail',compact('orderNumber' , 'order_detail_data' , 'ship_status' , 'notReady'));
    }

}