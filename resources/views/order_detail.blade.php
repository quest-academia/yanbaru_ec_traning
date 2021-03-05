
@extends('layouts.app')

<style>

table {
        width: 100%;
        height: 100%;
        margin: auto;
        border-collapse: collapse;
    }

    table tr {
        height: 70px;

    }

    thead tr {
        height: 40px;
    }

    table th {
        border-top: 2px solid black;
        border-bottom: 2px solid black;
    }

    tfoot {
        border-top: 2px solid black;
    }

    .address {
        padding: 20px;
        width: 90%;
        border: 2px solid #333333;
        border-radius: 10px;
    }

    </style>

@section('content')

@if($order_detail_data->isEmpty())
    <h1 style="font-weight: bolder">注文履歴は存在しません</h1>
@else
<div class="container">
                <div class="address">
                @foreach ($order_detail_data as $detail_data)
                @endforeach
                    お届け先<br>
                    <td>〒{{ $detail_data->user->zipcode }}<br>
                    {{ $detail_data->user->prefecture }}{{ $detail_data->user->municipality }}
                    {{ $detail_data->user->address }}　{{ $detail_data->user->apartments }}<br>
                    {{ $detail_data->user->first_name }}　{{ $detail_data->user->last_name }}　様</td>
                </div>
                <div class="order-detail py-2">
                    注文番号：{{$detail_data->order_number}}<br>
                    注文状態：{{$ship_status}}{{$notReady}}
                </div>
                @if($notReady === 1)
                <div class="main">
                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-danger mb-1">注文をキャンセルする</button>
                    </div>
                @else
                @endif
                <div class="main">
                    <div class="d-flex flex-row-reverse">

                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>商品名</th>
                                <th>商品カテゴリ</th>
                                <th>値段</th>
                                <th>個数</th>
                                <th>小計</th>
                                <th>備考</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($order_detail_data as $d2)
                        @foreach ($d2->orderDetails as $d3)
                        @endforeach
                            <tr>
                                <td>{{ $orderNumber += 1}}</td>
                                <td>{{$d3->products->product_name}}</td>
                                <td></td>
                                <td>{{$d3->products->price}}円</td>
                                <td>{{$d3->order_quantity}}　個</td>
                                <td>{{ $sub_total = $d3->products->price * $d3->order_quantity}}円</td>
                                <td>注文状態：{{ $d3->shipmentStatuses->shipment_status_name}}</td>
                                @php
                                $total = 0;
                                $total += $sub_total;
                                @endphp
                                @endforeach
                            </tr>
                
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td> 
                                <td></td>
                                <td></td>
                                <td>合計</td>
                                <td>{{ $total }}円</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-info mb-1">注文履歴に戻る</button>
                    </div>
                </div>
            </div>

        @endif
        </div>

  @endsection