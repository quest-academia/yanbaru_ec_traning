@extends('layouts.app')

@section('content')
<h1 class="display-5 text-center py-5 font-weight-bold ">購入完了しました</h1>
<p class="text-center mt-5 h3">ご購入ありがとうございます!<br>注文番号:{{ $orderDetail->order_detail_number }}</p>
<div class="d-flex justify-content-center">
  <div class="flex-row py-5 text-center mx-5">
    <a class="btn btn-primary btn-lg" href="/">Topに戻る</a>
  </div>
</div>
@endsection
