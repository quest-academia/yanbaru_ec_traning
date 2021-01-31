@extends('layouts.app')

@section('content')
    <main>
        <div class="container mt-5 text-center">
            <span class="display-4 font-weight-bold">やんばるエキスパート　ECサイト</span>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-3 text-center">
                <h4>まだアカウントを<br>お持ちでない方はこちら</h4>
                {!! link_to_route('signup', '新規登録', [], ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
            <div class="col-3 text-center">
                <h4>すでにアカウントを<br>お持ちの方はこちら</h4>
                {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-primary btn-lg']) !!}
            </div>
        </div>
    </main>
@endsection