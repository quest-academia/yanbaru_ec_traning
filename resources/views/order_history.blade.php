
@extends('layouts.app')

@section('content')

@if($order_information->isEmpty())
    <h1 style="font-weight: bolder">注文履歴は存在しません</h1>
@else
    <div class="container">
        <div class="row">
            <div class="d-flex">
                <div class="flex-row mb-3">
                    <a class="btn btn-secondary" href="{{ route('recently_orders') }}" role="button">直近３か月の注文を表示</a>
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
                @foreach ($order_information as $detailed_order_information)
                <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $detailed_order_information->order_detail_number }}</td>
                    <td>〒{{ $detailed_order_information->user->zipcode }}<br>
                    {{ $detailed_order_information->user->prefecture }}{{ $detailed_order_information->user->municipality }}
                    {{ $detailed_order_information->user->address }}　{{ $detailed_order_information->user->apartments }}<br>
                    {{ $detailed_order_information->user->first_name }}　{{ $detailed_order_information->user->last_name }}　様</td>
                    <td>注文日時:{{$detailed_order_information->order_date}} <br>
                    @foreach ($detailed_order_information->orderDetails as $order_detail)
                    注文状態：{{ $order_detail->shipmentStatuses->shipment_status_name }}
                    @endforeach
                    </td>
                    <td><a class="btn btn-secondary" href="{{ route('order_detail', ['id' => $detailed_order_information->order_detail_number]) }}" role="button">詳細</a></td>
                </tr>
                @endforeach 
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $order_information->links() }}
        </div>
        @endif
        </div>

        @endsection