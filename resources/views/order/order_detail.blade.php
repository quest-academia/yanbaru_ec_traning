@extends('layouts.app')

@section('content')

<div class="wrapper">
    <main>
        @if ($ordersHistory->isEmpty())
            <div class="container py-3">
                <div class="mx-auto">
                    <h3>該当の注文が見つかりませんでした...</h3>
                    <h3>注文履歴画面に戻り、やり直してください</h3>
                    <h3><a class="toSearchItem btn btn-primary btn-lg" href="{{ route('order.history') }}" role="button">注文履歴画面へ</a></h3>
                </div>
            </div>
        @else
            <div class="container-fluid py-3">
                <div class="row col-12 justify-content-center m-0">
                    <div class="col-12">
                        <!-- お届け先 -->
                        <div class="col-12 py-3 px-3 border border-dark rounded">
                            <h5 class="mb-0">
                                お届け先
                            </h5>
                            <div class="px-3 py-1">
                                <div class="col-12 row px-3">
                                    <div class="col-2"><span id="postal_code">〒{{ $userInfo->zipcode }}</span></div>
                                    <div class="col-8" id="address">
                                        {{ $userInfo->prefecture }}
                                        {{ $userInfo->municipality }}
                                        {{ $userInfo->address }}
                                    </div>
                                </div>
                                <div class="col-12 row px-3">
                                    <div class="col-2"></div>
                                        <div class="col-8" id="name">
                                            {{ $userInfo->last_name }}
                                            {{ $userInfo->first_name }}
                                        <span class="ml-1">様</span></div>
                                    </div>
                                </div>
                            </div>
                        <!-- 注文番号・注文状態 -->
                        <div class="col-12 py-3 px-4">
                            <div class="row">
                                <div>
                                    注文番号：
                                </div>
                                <div id="order_number">
                                {{ $orderDetail->order_detail_number }}
                                </div>
                            </div>
                            <div class="row">
                                <div>
                                    注文状態：
                                </div>
                                <div id="current_order_status">
                                    @if ($preparationOrderFlg)
                                        準備中
                                    @else
                                        発送済
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- 注文キャンセルボタン -->
                        @if ($preparationOrderFlg)
                            <div class="text-right">
                                <a href="{{ action('OrderDetailController@edit', $ordersHistory[0]->order_detail_number) }}" class="btn btn-danger">注文をキャンセルする</a>
                            </div>
                        @endif
                        <div class="mt-2">
                            <table class="table border-bottom">
                                <thead>
                                    <tr class="d-flex">
                                        <th scope="col" class="col-1 px-0 py-1 text-center">No</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">商品名</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">商品カテゴリ</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">値段</th>
                                        <th scope="col" class="col-1 px-0 py-1 text-center">個数</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">小計</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center"></th>
                                    </tr>
                                </thead>
                                    <tbody class="" style="overflow-y:auto;max-height:400px;display:block">
                                        @foreach ($ordersHistory as $orderHistory)
                                            <tr class="d-flex">
                                                @php
                                                    $subtotal = $orderHistory->Product->price * $orderHistory->order_quantity;
                                                @endphp
                                            <th scope="row" class="col-1 px-0 text-center">1</th>
                                            <td class="col-2 px-0 text-center">{{ $orderHistory->Product->product_name }}</td>
                                            <td class="col-2 px-0 text-center">{{ $orderHistory->Product->category->category_name }}</td>
                                            <td class="col-2 px-0 text-center">{{ $orderHistory->Product->price }}円</td>
                                            <td class="col-1 px-0 text-center">{{ $orderHistory->order_quantity }}<span>個</span></td>
                                            <td class="col-2 px-0 text-center">{{ $subtotal }}円</td>
                                            <td class="col-2 px-0 text-center">注文状態：<span id="order_status_1">{{ $orderHistory->shipmentStatus->shipment_status_name }}</span></td>
                                                @php
                                                    $total += $subtotal;
                                                @endphp
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- 合計 -->
                                <div class="col-12 row justify-content-end m-0 p-0">
                                    <div class="col-1 text-center px-0">合計</div>
                                    <div class="col-2 text-center px-0">{{ $total }}円</div>
                                    <div class="col-2 text-center"></div>
                                </div>
                            <!-- ボタン -->
                            <div class="col-12 row justify-content-end mt-3 p-0 no-gutters">
                                <a class="btn btn-info" href="{{ route('order.history') }}" role="button">注文履歴に戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
</div>

@endsection
