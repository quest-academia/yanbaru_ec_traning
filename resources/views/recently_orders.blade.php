@extends('layouts.app')

@section('content')

@if($orderInformations->isEmpty())
    <h1 class="text-center py-5">該当の注文は見つかりませんでした･･･</h1>
        <p class="text-center mt-5 h3">注文履歴画面に戻り､やり直してください</p>
    <div class="d-flex justify-content-center">
    <div class="flex-row py-5 text-center mx-5">
        <a class="btn btn-primary" href="{{ route('order.history') }}" role="button">注文履歴画面へ</a>
    </div>
    </div>
@else
    <div class="container">
        <div class="row">
            <div class="d-flex">
                <div class="flex-row mb-3">
                    <a class="btn btn-secondary" href="{{ route('order.history') }}" role="button">全ての注文を表示</a>
                </div>
            </div>
        </div>
        <div class="row">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">注文番号</th>
                <th scope="col">お届け先</th>
                <th scope="col">備考</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach  ($orderInformations as $order)
                <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $order->order_number }}</td>
                    <td>〒{{ $order->user->zipcode }}<br>
                    {{ $order->user->prefecture }}{{ $order->user->municipality }}
                    {{ $order->user->address }}　{{ $order->user->apartments }}<br>
                    {{ $order->user->first_name }}　{{ $order->user->last_name }}　様</td>
                    <td>注文日時:{{ $order->order_date }} <br>
                    @foreach  ($order->orderDetails as $orderDetail)
                    注文状態：{{ $orderDetail->shipmentStatuses->shipment_status_name }}
                    @endforeach
                    </td>
                    <td><a class="btn btn-secondary" href="" role="button">詳細</a></td>
                </tr>
                @endforeach 
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $orderInformations->links() }}
        </div>
@endif
</div>

@endsection