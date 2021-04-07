@extends('layouts.app')

@section('content')

    <main>
        <div class="page-header mt-5 pt-5 text-center">
            <h4>ユーザ情報</h4>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-sm-6 mx-auto">

                <div class="mb-3">
                    <p class="contents">ユーザID</p>
                    <p class="contents-text">{{ $user->id }}</p>
                </div>

                <div class="mb-3">
                    <p class="contents">氏名</p>
                    <p class="contents-text"> {{$user->last_name}} {{$user->first_name}}</p>
                </div>

                <div class="mb-3">
                    <p class="contents" id="content-address">
                        住所
                    </p>
                    <div class="contents-text">
                        <p class="mb-1">〒{{$user->zipcode}}</p>
                        <p class="mb-1">{{$user->prefecture}}{{$user->municipality}}{{$user->address}}{{$user->apartments}}</p>
                    </div>
                </div>

                <div class="mb-3">
                    <p class="contents">電話番号</p>
                    <p class="contents-text">{{$user->phone_number}}</p>
                </div>

                <div class="mb-3">
                    <p class="contents">メールアドレス</p>
                    <p class="contents-text">{{$user->email}}</p>
                </div>

                <div class="text-center mt-5 ">
                    <button type="submit" class="btn btn-primary w-25">修正/退会する</button>
                </div>
            </div>
        </div>
    </main>
@endsection
