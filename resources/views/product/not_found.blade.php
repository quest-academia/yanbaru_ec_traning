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
                        {!! link_to_route('search', '商品検索画面へ', [], ['class' => 'btn btn-primary py-3']) !!}
                    </div>
                </div>                 
            </div>
        </section>
    </div>
@endsection
