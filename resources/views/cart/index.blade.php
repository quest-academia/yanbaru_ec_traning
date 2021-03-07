@extends('layouts.app')

@section('content')

<div class="container-fluid pt-3">
        
        <section>                     
          <div class="container">
              <div class="card card-body-dark mt-5">
                <h4 class="mt-4" style="padding-left: 20px;">お届け先</h4>
                <div class="address mb-2" style="padding-left: 20px;">
                  〒{{ Auth::user()->zipcode }} {{ Auth::user()->prefucture }}{{ Auth::user()->municipality }}{{ Auth::user()->address }}{{ Auth::user()->apratments }}<br>
                      {{ Auth::user()->first_name }}　{{ Auth::user()->last_name }} 様
                </div>
            </div>
          </div>
          <div class="main mt-5">
            <table>
              <thead>
                <tr class="text-center">
                  <th class="border-bottom border-dark" style="width:13%;">No</th>
                  <th class="border-bottom border-dark" style="width:18%;">商品名</th>
                  <th class="border-bottom border-dark" style="width:15%;">商品カテゴリ</th>
                  <th class="border-bottom border-dark" style="width:15%;">値段</th>
                  <th class="border-bottom border-dark" style="width:15%;">個数</th>
                  <th class="border-bottom border-dark" style="width:15%;">小計</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cartData as $key => $data)
                <tr class="text-center">
                  <td class="align-middle">{{ $key += 1 }}</td>
                    <td class="align-middle">{{ $data['product_name'] }}</td>
                    <td class="align-middle">{{ $data['category_name'] }}</td>
                    <td class="align-middle">{{ number_format($data['price']) }}円</td>
                    <td class="quantity text-center align-middle"> {{ $data['session_quantity'] }}個</td>                    
                    <td class="align-middle">{{ number_format($data['session_quantity'] * $data['price']) }}円</td>
                    <td class="btn btn-danger">
                    {!! Form::open(['route' => ['cartItemDelete', 'method' => 'post', $data['session_products_id']]]) !!}
                      @csrf
                        {{ Form::submit('削除', ['name' => 'delete_products_id', 'class' => 'btn btn-danger btn-sm']) }}
                        {{ Form::hidden('product_id', $data['session_products_id']) }}
                        {{ Form::hidden('product_quantity', $data['session_quantity']) }}
                    {!! Form::close() !!}
                    </td>
                  @endforeach
                </tr>                
                  <tr>
                  <th class="border-bottom-0 align-middle"></th>
                  <td class="border-bottom-0 align-middle"></td> 
                  <td class="border-bottom-0 align-middle"></td>
                  <td class="border-bottom-0 align-middle"></td>
                  <td class="border-bottom-0 align-middle">合計</td>
                  @php
                    $totalPrice = number_format(array_sum(array_column($cartData, 'itemPrice')))
                  @endphp
                  <td class="border-bottom-0 align-middle">
                    {{ $totalPrice }}円
                  </td>                 
                </tr>             
            </div>
          </div>
        </tbody>
        </table>
        <div class="button text-center col-12 row justify-content-center my-4">
            <a class="btn btn-info mx-5" href="{{ route('search') }}">買い物を続ける</a>
            {!! Form::open(['route' => ['cartFinalized', 'method' => 'post', $data['session_products_id']]]) !!}
            {{ Form::submit('注文を確定する', ['name' => 'orderFinalized', 'class' => 'btn btn-primary mx-5']) }}
            {!! Form::close() !!}
        </div>
        </section>
</div>

@endsection