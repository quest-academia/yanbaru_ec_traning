@extends('layouts.app')
@section('content')
    <main>
        <div class="container">
            <div class="mx-auto">
                <h2 class="pt-5">該当商品が見つかりませんでした...</h2>
                <h3 class="pt-5">商品検索画面に戻り、やり直してください</h3>
                
                <h3 class="pt-5">
                {!! link_to_route('show', '商品検索画面', [], ['class' => 'btn btn-primary btn-lg']) !!}
                </h3>
            </div>
        </div>
    </main>
@endsection