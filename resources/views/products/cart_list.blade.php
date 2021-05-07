@extends('layouts.app')

@section('content')
<main>

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
                            <div class="col-2"><span id="postal_code">〒{{ $auth->zipcode }}</span></div>
                            <div class="col-8" id="address">{{ $auth->prefecture }}{{ $auth->municipality }}{{ $auth->address }}{{ $auth->apartments }}</div>
                        </div>
                        <div class="col-12 row px-3">
                            <div class="col-2"></div>
                            <div class="col-8" id="name">{{ $auth->last_name }} {{ $auth->first_name }}<span class="ml-1">様</span></div>
                        </div>
                    </div>
                </div>
                <!-- カート内商品 -->
                <div class="mt-5">
                    <table class="table border-bottom">
                        <thead>
                            <tr class="d-flex">
                                <th scope="col" class="col-1 px-0 py-1 text-center">No</th>
                                <th scope="col" class="col-2 px-0 py-1 text-center">商品名</th>
                                <th scope="col" class="col-2 px-0 py-1 text-center">商品カテゴリ</th>
                                <th scope="col" class="col-2 px-0 py-1 text-center">値段</th>
                                <th scope="col" class="col-2 px-0 py-1 text-center">個数</th>
                                <th scope="col" class="col-2 px-0 py-1 text-center">小計</th>
                                <th scope="col" class="col-1 px-0 py-1 text-center"></th>
                            </tr>
                        </thead>
                        <tbody style="overflow-y:auto;max-height:400px;display:block">
                            @foreach ($cartData as $key => $data)
                            <tr class="d-flex">
                                <th scope="row" class="col-1 px-0 text-center">{{ $key += 1 }}</th>
                                <td class="col-2 px-0 text-center">
                                    {{ $data['product_name'] }}
                                </td>
                                <td class="col-2 px-0 text-center">
                                    {{ $data['category_name'] }}
                                </td>
                                <td class="col-2 px-0 text-center">
                                    ¥{{ number_format($data['price']) }} 円
                                </td>
                                <td class="col-2 px-0 text-center">
                                    <button type="button" class="btn btn-outline-dark">
                                        {{ $data['session_products_quantity'] }}
                                    </button>
                                    個
                                </td>
                                <td class="col-2 px-0 text-center">
                                    ¥{{ number_format($data['session_products_quantity'] * $data['price']) }}
                                </td>




                                <form class="quantitySelection" action="itemRemove" method="post" value="{{  $data['session_products_id'] }}">
                                    @csrf
                                    <td class="col-1 px-0 text-center">
                                        <input type="submit" name="delete_products_id" class="btn btn-danger" value="削除">
                                    </td>
                                    <input id="product_id" name="product_id" type="hidden" value="{{  $data['session_products_id'] }}">
                                    <input id="product_quantity" name="product_quantity" type="hidden" value="{{  $data['session_products_quantity'] }}">
                                </form>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- 合計 -->
                    <div class="col-12 row justify-content-end m-0 p-0">
                        <div class="col-2 text-center px-0">合計</div>
                        @php
                        $totalPrice = number_format(array_sum(array_column($cartData, 'itemPrice')))
                        @endphp
                        <div class="col-2 text-center px-0">
                            ¥{{ $totalPrice }}円
                        </div>
                        <div class="col-1 text-center"></div>
                    </div>
                    <!-- ボタン -->
                    <div class="col-12 row justify-content-center mt-3">
                        <button  class="btn btn-info mx-3">買い物を続ける</button>

                        <form class="btn btn-primary mx-3" action="orderFinalize" method="post" value="{{  $data['session_products_id'] }}">
                        @csrf
                        <td class="col-1 px-0 text-center">
                            <input type="submit" name="orderFinalize" class="btn btn-primary" value="注文を確定する">
                        </td>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection 
