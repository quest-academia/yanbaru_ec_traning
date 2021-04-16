@extends('layouts.app')

@section('content')

<main>
    <div class="container-fluid py-3 mt-5 pt-5">
        <div class="row col-12 justify-content-center m-0">
            <div class="col-12">
                <!-- お届け先 -->
                <div class="col-12 py-3 px-3 border border-dark rounded">
                    <h5 class="mb-0">
                        お届け先
                    </h5>
                    <div class="px-3 py-1">
                        <div class="col-12 row px-3">
                            <div class="col-2"><span id="postal_code">〒123-4567</span></div>
                            <div class="col-8" id="address">沖縄県那覇市那覇 1-15-2</div>
                        </div>
                        <div class="col-12 row px-3">
                            <div class="col-2"></div>
                            <div class="col-8" id="name">山原水鶏<span class="ml-1">様</span></div>
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
                            12345678
                        </div>
                    </div>
                    <div class="row">
                        <div>
                            注文状態：
                        </div>
                        <div id="current_order_status">
                            進行中
                        </div>
                    </div>
                </div>
                <!-- 注文キャンセルボタン -->
                <div class="col-12 text-right p-0">
                    <button class="btn btn-danger btn-sm">注文をキャンセルする</button>
                </div>

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
                            <tr class="d-flex">
                                <th scope="row" class="col-1 px-0 text-center">1</th>
                                <td class="col-2 px-0 text-center">商品1</td>
                                <td class="col-2 px-0 text-center">食料品</td>
                                <td class="col-2 px-0 text-center">1000円</td>
                                <td class="col-1 px-0 text-center">5<span>個</span></td>
                                <td class="col-2 px-0 text-center">5000円</td>
                                <td class="col-2 px-0 text-center">注文状態：<span id="order_status_1">準備中</span></td>
                            </tr>
                            <tr class="d-flex">
                                <th scope="row" class="col-1 px-0 text-center">2</th>
                                <td class="col-2 px-0 text-center">商品2</td>
                                <td class="col-2 px-0 text-center">食料品</td>
                                <td class="col-2 px-0 text-center">2000<span>円</span></td>
                                <td class="col-1 px-0 text-center">2<span>個</span></td>
                                <td class="col-2 px-0 text-center">4000円</td>
                                <td class="col-2 px-0 text-center">注文状態：<span id="order_status_2">準備中</span></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- 合計 -->
                    <div class="col-12 row justify-content-end m-0 p-0">
                        <div class="col-1 text-center px-0">合計</div>
                        <div class="col-2 text-center px-0">9000円</div>
                        <div class="col-2 text-center"></div>
                    </div>
                    <!-- ボタン -->
                    <div class="col-12 row justify-content-end mt-3 p-0 no-gutters">
                        <button class="btn btn-info btn-sm">注文履歴に戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
