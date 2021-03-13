
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
    </style>

@section('content')

@if($orderDetailData->isEmpty())
    <h1 style="font-weight: bolder">注文履歴は存在しません</h1>
@else
<div class="container">
        <div class="userAddress">
        @foreach ($orderDetailData as $detailData)
        @endforeach
            お届け先<br>
            <td>〒{{ $detailData->user->zipcode }}<br>
            {{ $detailData->user->prefecture }}{{ $detailData->user->municipality }}
            {{ $detailData->user->address }}　{{ $detailData->user->apartments }}<br>
            {{ $detailData->user->first_name }}　{{ $detailData->user->last_name }}　様</td>
        </div>
        <div class="order-detail py-2">
            注文番号：{{ $detailData->order_number }}<br>
            @foreach ($detailData->orderDetails as $getDetail)
            @endforeach
            注文状態：{{ $getDetail->shipmentStatuses->shipment_status_name }}
        </div>
        @if($checkInPreparation === 1)
            @component('components.btn-cancel')
                @slot('controller', 'Orders')
                @slot('orderId', $detailData->id)
                @slot('userId', $detailData->user->id)
            @endcomponent
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
                @foreach ($orderDetailData as $detailData)
                    @foreach ($detailData->orderDetails as $getDetail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $getDetail->products->product_name }}</td>
                            <td></td>
                            <td>{{ $getDetail->products->price }}円</td>
                            <td>{{ $getDetail->order_quantity }}　個</td>
                            <td>{{ $subTotal = $getDetail->products->price * $getDetail->order_quantity }}円</td>
                            <td>注文状態：{{ $getDetail->shipmentStatuses->shipment_status_name }}</td>
                            @php
                            $total += $subTotal;
                            @endphp
                    @endforeach
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
            <a class="btn btn-info" href="{{ route('order.history') }}" role="button">注文履歴に戻る</a>
            </div>
        </div>
    </div>
@endif
</div>

@endsection