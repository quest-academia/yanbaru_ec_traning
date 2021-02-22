
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

@if(!$data3->isEmpty())
<h1 style="font-weight: bolder">注文履歴は存在しません</h1>
@else
<div class="container">
                <div class="address">
                    お届け先<br>
                    <td>〒{{ $detailed_order_information->user->zipcode }}<br>
                    {{ $detailed_order_information->user->prefecture }}{{ $detailed_order_information->user->municipality }}
                    {{ $detailed_order_information->user->address }}　{{ $detailed_order_information->user->apartments }}<br>
                    {{ $detailed_order_information->user->first_name }}　{{ $detailed_order_information->user->last_name }}　様</td>
                </div>
                <div class="order-detail py-2">
                    注文番号：1234567890<br>
                    注文状態：準備中
                </div>
                <div class="main">
                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-danger mb-1">注文をキャンセルする</button>
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
                            <tr>
                                <td>1</td>
                                <td>商品1</td>
                                <td>食料品</td>
                                <td>1000円</td>
                                <td>5　個</td>
                                <td>5000円</td>
                                <td>注文状態：準備中</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>商品2</td>
                                <td>食料品</td>
                                <td>2000円</td>
                                <td>2　個</td>
                                <td>4000円</td>
                                <td>注文状態：準備中</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td> 
                                <td></td>
                                <td></td>
                                <td>合計</td>
                                <td>9000円</td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="d-flex flex-row-reverse">
                        <button class="btn btn-info mb-1">注文履歴に戻る</button>
                    </div>
                </div>
            </div>

  @endsection