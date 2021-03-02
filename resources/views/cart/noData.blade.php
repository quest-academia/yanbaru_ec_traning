@extends('layouts.app')

@section('content')

        <div class="container">
              <div class="card card-body-dark mt-5">
                <h4 class="mt-4" style="padding-left: 20px;">お届け先</h4>
                <div class="address mb-2" style="padding-left: 20px;">
                  〒{{ Auth::user()->zipcode }} {{ Auth::user()->prefucture }}{{ Auth::user()->municipality }}{{ Auth::user()->address }}{{ Auth::user()->apratments }}<br>
                      {{ Auth::user()->first_name }}　{{ Auth::user()->last_name }} 様
                </div>
            </div>
          </div>
        <div class="message text-center my-5">
            <h3>カートに商品はありません</h3>
        </div>

@endsection