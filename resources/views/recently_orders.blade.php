@extends('layouts.app')

@section('content')

@if($orderInformations->isEmpty())
    <h1 style="font-weight: bolder">注文履歴は存在しません</h1>
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
                @php dd($orderInformations) @endphp
                    <td>{{ $order->order_number }}</td>
                    <td>〒{{ $order->user->zipcode }}<br>
                    {{ $order->user->prefecture }}{{ $order->user->municipality }}
                    {{ $order->user->address }}　{{ $order->user->apartments }}<br>
                    {{ $order->user->first_name }}　{{ $order->user->last_name }}　様</td>
                    <td>注文日時:{{ $order->order_date }} <br>
                    @foreach  ($order->orderDetails as $order_detail)
                    注文状態：{{ $order_detail->shipmentStatuses->shipment_status_name }}
                    @endforeach
                    </td>
                    <td><a class="btn btn-secondary" href="{{ route('order_detail', ['id' => $order->order_detail_number]) }}" role="button">詳細</a></td>
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