@extends('layouts.app')

@section('content')

<main>
    <div class="page-header mt-5 text-center">
        <h4>ユーザ情報</h4>
    </div>

    {!! Form::open(['route' => 'user_info']) !!}
            <div class="row mt-5 mb-5">
                <div class="col-sm-6 mx-auto">

                    <div class="mb-3">
                        <p class="contents">ユーザID : {{$user->id}}</p>
                    </div>

                    <div class="mb-3">
                        <p class="contents">氏名 : {{$user->last_name}} {{$user->first_name}}</p>
                    </div>

                    <div class="mb-3">
                        <p class="contents">郵便番号 : {{$user->zipcode}}</p>
                    </div>

                    <div class="mb-3">
                        <p class="contents" id="content-address">
                            住所 : {{$user->prefecture}}{{$user->municipality}}{{$user->address}}{{$user->apartments}}
                        </p>
                    </div>

                    <div class="mb-3">
                        <p class="contents">メールアドレス : {{$user->email}}</p>
                    </div>

                    <div class="mb-3">
                        <p class="contents">電話番号 : {{$user->phone_number}}</p>
                    </div>

                    <div class="text-center mt-5">
                        {!! link_to_route('user_edit', '修正/退会する', [], ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>
            </div>
    {!! Form::close() !!}
</main>            
@endsection