@extends('layouts.app')

@section('content')

    <h1 class="text-center py-5 font-weight-bold">やんばるエキスパート ECサイト</h1>
    <div class="d-flex justify-content-center">
        <div class="flex-row py-5 text-center mx-5">
            <p class="lead">まだアカウントを<br>お持ちでない方はこちら</p>
            {!! link_to_route('signup', '新規登録', [], ['class' => 'btn btn-primary py-3']) !!}
        </div>
        <div class="flex-row py-5 text-center mx-5">
            <p class="lead">すでにアカウントを<br>お持ちの方はこちら</p>
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-primary py-3']) !!}
        </div>
    </div>

@endsection
