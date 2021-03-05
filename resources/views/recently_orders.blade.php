@extends('layouts.app')

@section('content')

@if($orderInformation->isEmpty())
    <h1 style="font-weight: bolder">注文履歴は存在しません</h1>
@else
    <div class="container">
        <div class="row">
            <div class="d-flex">
                <div class="flex-row mb-3">
                    <a class="btn btn-secondary" href="{{ route('order_history') }}" role="button">全ての注文を表示</a>
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
                @foreach ($orderInformation as $detailed_orderInformation)
                <tr>
                <th scope="row">{{ $orderNumber += 1}}</th>
                    <td>{{$detailed_orderInformation->order_detail_number}}</td>
                    <td>〒{{ $detailed_orderInformation->user->zipcode }}<br>
                    {{ $detailed_orderInformation->user->prefecture }}{{ $detailed_orderInformation->user->municipality }}
                    {{ $detailed_orderInformation->user->address }}　{{ $detailed_orderInformation->user->apartments }}<br>
                    {{ $detailed_orderInformation->user->first_name }}　{{ $detailed_orderInformation->user->last_name }}　様</td>
                    <td>注文日時:{{$detailed_orderInformation->order_date}} <br>
                    @foreach ($detailed_orderInformation->orderDetails as $order_detail)
                    注文状態：{{ $order_detail->shipmentStatuses->shipment_status_name}}
                    @endforeach
                    </td>
                    <td><a class="btn btn-secondary" href="{{ route('order_detail' , ['id' => $detailed_orderInformation->order_detail_number]) }}" role="button">詳細</a></td>
                </tr>
                @endforeach 
            </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $orderInformation->links() }}
        </div>
        @endif
        </div>

        @endsection