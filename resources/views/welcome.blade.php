@extends('layouts.app')

@section('content')

    <main>
        <div class="container mt-5 pt-5 text-center">
            <span class="display-4 font-weight-bold">やんばるエキスパート　ECサイト</span>
        </div>
        
        <div class="row justify-content-center mt-5">
            <div class="col-4 text-center">
                <h3>まだアカウントを<br>お持ちでない方はこちら</h3>
                <button type="button" class="btn btn-primary mt-5" style="width:120px;height:50px">新規登録</button>
            </div>
            
            <div class="col-4 text-center">
                <h3>すでにアカウントを<br>お持ちの方はこちら</h3>
                <button type="button" class="btn btn-primary mt-5" style="width:120px;height:50px">ログイン</button>
            </div>
        </div>
    </main>

@endsection