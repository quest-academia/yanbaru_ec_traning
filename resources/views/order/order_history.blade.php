@extends('layouts.app')

@section('content')
    <main>
        <div class="container-fluid py-3">
            <div class="row col-12 justify-content-center m-0">
                <!-- 削除後のリダイレクト処理で結果を表示する -->
                @if (isset($deleteResult) && !empty($deleteResult))
                    <div class="alert alert-danger col-12">
                        {{$deleteResult}}
                    </div>
                @endif
                <div class="col-12">
                    <!-- 直近3ヶ月表示ボタン -->
                    <div class="col-12 ">
                        @if($showAllBtn)
                            <a class="btn btn-secondary btn-sm" href="{{ route('o_history', ['term' => false]) }}" role="button">全件を表示する</a>
                        @else
                            <a class="btn btn-secondary btn-sm" href="{{ route('o_history', ['term' => true]) }}" role="button">直近3ヶ月の注文を表示</a>
                        @endif
                    </div>
                    <div class="mt-2">
                        <table class="table">
                            <thead>
                                <tr class="d-flex">
                                    <th scope="col" class="col-1 px-0 py-1 text-center">No</th>
                                    <th scope="col" class="col-2 px-0 py-1 text-center">注文番号</th>
                                    <th scope="col" class="col-4 px-2 py-1">お届け先</th>
                                    <th scope="col" class="col-3 px-0 py-1">備考</th>
                                    <th scope="col" class="col-2 px-0 py-1 text-center"></th>
                                </tr>
                            </thead>
                            <tbody style="overflow-y:auto;height:400px;display:block">
                                @if (!$orderHistoryData->isEmpty())
                                    @foreach ($orderHistoryData as $key => $orderHistory)
                                        <tr class="d-flex">
                                            <th scope="row" class="col-1 px-0 text-center">{{$key+1}}</th>
                                            <td class="col-2 px-0 text-center" id="order_number_1">
                                                {{ $orderHistory->order_detail_number }}
                                            </td>
                                            <td class="col-4 px-2">
                                                <div>〒<span id="postal_code_1">{{ formatPostal($orderHistory->zipcode) }}</span></div>
                                                <div id="address_1">
                                                    <span>{{ $orderHistory->prefecture }}</span>
                                                    <span>{{ $orderHistory->municipality }}</span>
                                                    <span>{{ $orderHistory->address }}</span>
                                                    <span>{{ $orderHistory->apartments }}</span>
                                                </div>
                                                <div id="order_name_1">
                                                    <span>
                                                        {{ $orderHistory->last_name }}
                                                    </span>
                                                    <span>
                                                        {{ $orderHistory->first_name }}
                                                    </span>
                                                    <span class="px-1">様</span>
                                                </div>
                                            </td>
                                            <td class="col-3 px-0">
                                                <div>注文日時：<span id="order_date_2">{{ formatDate($orderHistory->order_date) }}</span></div>
                                                <div>注文状態：<span id="order_status_2">{{ $orderHistory->shipment_status }}</span></div>
                                            </td>
                                            <td class="col-2 px-0 text-center">
                                                {!! link_to_route(
                                                    'o_detail',
                                                    '詳細',
                                                    [
                                                        'orderBaseNumber'    => $orderHistory->id,
                                                        'orderDetailNumber'  => $orderHistory->order_detail_number,
                                                        'currentOrderStatus' => $orderHistory->shipment_status
                                                    ],
                                                    ['class' => 'btn btn-primary btn-sm']) !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="d-flex align-items-center justify-content-center">
                                        <td colspan="5">データがありません</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- ページング -->
                        <div class="d-flex align-items-center justify-content-center">
                            {{ $orderHistoryData->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection