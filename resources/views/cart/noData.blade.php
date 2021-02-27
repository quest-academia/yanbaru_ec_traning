@extends('layouts.app')

@section('content')

        <div class="container">
          <div class="address">
            〒{{ Auth::user()->zipcode }} {{ Auth::user()->prefucture }}{{ Auth::user()->municipality }}{{ Auth::user()->address }}{{ Auth::user()->apratments }}<br>
                {{ Auth::user()->first_name }}　{{ Auth::user()->last_name }} 様
          </div>
        </div>
        <div class="message text-center">
            <p>カートに商品はありません</p>
        </div>

@endsection