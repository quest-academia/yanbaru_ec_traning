@extends('layouts.app')

@section('content')
    <main>
        <div class="container mt-5 text-center">
                <span class="display-4 font-weight-bold">やんばるエキスパート　ECサイト</span>
            </div>
    
            <div class="row justify-content-center mt-5">
                <div class="col-3 text-center">
                    <h3>まだアカウントを<br>お持ちでない方はこちら</h3>
                    <button type="button" class="btn btn-primary">新規登録</button>

                </div>
                <div class="col-3 text-center">
                    <h3>すでにアカウントを<br>お持ちの方はこちら</h3>
                    <button type="button" class="btn btn-primary">ログイン</button>
                </div>
            </div>
    </main>
@endsection