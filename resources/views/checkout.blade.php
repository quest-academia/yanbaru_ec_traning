@extends('layouts.app')
@section('content')
<main>
  <div class="container">
    <div class="mx-auto">
      <h2 class="pt-5">購入完了しました</h2>
      <h3 class="pt-5">ご購入ありがとうございます！</h3>
      <h3>注文番号：{{ $orderDitailNumber }}</h3>
      <h3 class="pt-5">{!! link_to_route('home', 'TOPに戻る', [], ['class' => 'btn btn-primary btn-lg']) !!}</h3>
    </div>
  </div>
</main>
@endsection