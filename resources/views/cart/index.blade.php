@extends('layouts.app')

@section('content')

<div class="container-fluid pt-3">
        
        <section>                     
                <div class="container">
          <div class="address">
            〒{{ Auth::user()->zipcode }} {{ Auth::user()->prefucture }}{{ Auth::user()->municipality }}{{ Auth::user()->address }}{{ Auth::user()->apratments }}<br>
                {{ Auth::user()->first_name }}　{{ Auth::user()->last_name }} 様
          </div>
          <div class="main mt-5">
            <table>
              <thead>
                <tr>
                  <th>No</th>
                  <th>商品名</th>
                  <th>商品カテゴリ</th>
                  <th>値段</th>
                  <th>個数</th>
                  <th>小計</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  @foreach($cartData as $key => $data)
                  <td>{{ $key += 1 }}</td>
                    <td>{{ $data['product_name'] }}</td>
                    <td>{{ $data['category_name'] }}</td>
                    <td>{{ number_format($data['price']) }}円</td>
                    <td><button type="button" class="btn btn-outline-dark"> {{ $data['session_quantity'] }}</button>個</td>                    
                    <td>{{ number_format($data['session_quantity'] * $data['price']) }}円</td>
                    <td>
                    {!! Form::open(['route' => ['itemDelete', 'method' => 'post', $data['session_products_id']]]) !!}
                      @csrf
                        {{ Form::submit('削除', ['name' => 'delete_products_id', 'class' => 'btn btn-danger']) }}
                        {{ Form::hidden('product_id', $data['session_products_id']) }}
                        {{ Form::hidden('product_quantity', $data['session_quantity']) }}
                    {!! Form::close() !!}
                    </td>
                  @endforeach
                </tr>
                
              </tbody>
              <tfoot>
                <tr>
                  <td></td>
                  <td></td> 
                  <td></td>
                  <td></td>
                  <td>合計</td>
                  @php
                    $totalPrice = number_format(array_sum(array_column($cartData, 'itemPrice')))
                  @endphp
                    <td class="border-bottom-0 align-middle">
                        {{ $totalPrice }}円
                    </td>                 
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="button text-center">
            {!! link_to_route('search', '商品検索', [], ['class' => 'btn btn-primary py-3']) !!}
            {!! Form::open(['route' => ['orderFinalized', 'method' => 'post', $data['session_products_id']]]) !!}
              {{ Form::submit('注文を確定する', ['name' => 'orderFinalized', 'class' => 'btn btn-primary']) }}
            {!! Form::close() !!}
          </div>
        </div>
        </section>
</div>

@endsection