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
            </div>
            <div class="mt-5">
                <div class="text-center">
                    <p class="h2">カートに商品はありません</p>
                </div>
            </div>
        </div>
    </div>            
</main>

@endsection
