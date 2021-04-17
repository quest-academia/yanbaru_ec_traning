@extends('layouts.app')

@section('content')

    <main>
        <div class="container pt-5">
            <div class="mx-auto">
                <h2>該当商品が見つかりませんでした...</h2>
                <h3>商品検索画面に戻り、やり直してください</h3>
                <div class="mt-5">
                    <h3><a href="/products" class="toSearchItem btn btn-primary btn-lg">商品検索画面へ</a></h3>
                </div>    
            </div>
        </div>
    </main>

@endsection