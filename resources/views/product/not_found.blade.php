@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <section>
            <div class="row justify-content-center">
                <div class="d-flex flex-column">
                    <div class="col-12">
                        <p class="h2 text-center font-weight-bold pt-5">該当商品が見つかりませんでした...</p>
                        <p class="lead text-center font-weight-bold pt-5">商品画面に戻り、やり直してください</p>
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        {{-- todo: 商品詳細画面実装後href部分変更予定 --}}
                        <a class="btn btn-primary btn-lg" href="#" role="button">商品検索画面へ</a>
                    </div>
                </div>                 
            </div>
        </section>
    </div>
@endsection