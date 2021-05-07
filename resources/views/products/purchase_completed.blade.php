@extends('layouts.app')
@section('content')
<main>
  <div class="container">
    <div class="mx-auto">
      <h2 class="pt-5">購入完了しました</h2>
      <h3 class="pt-5">ご購入ありがとうございます！</h3>
      <h3>注文番号：{{ $orderDetail->order_detail_number }}</h3>
      <div class="flex-row py-5 text-center mx-5">
        <a class="btn btn-primary btn-lg" href="/">Topに戻る</a>
      </div>
    </div>
  </div>
</main>
@endsection
