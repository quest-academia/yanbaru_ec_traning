@extends('layouts.app')

@section('content')

<div class="container" style="width:40%">
<h2 class="text-center mt-5">ログイン画面</h2>

    <div class="container mt-3" style="width:70%;">

        {!! Form::open(['route' => 'login.post']) !!}

            @csrf

            <div class="form-group">
                {!! Form::label('email', 'メールアドレス') !!}
                {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>

            @if ($errors->first('email'))
                <p class="validation">※{{ $errors->first('email') }}</p>
            @endif

            <div class="form-group">
                {!! Form::label('password', 'パスワード') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            @if ($errors->first('password'))
                <p class="validation">※{{ $errors->first('password') }}</p>
            @endif

            <div class="d-flex justify-content-center">
                {!! Form::submit('ログイン', ['class' => 'btn btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

        <a class="d-flex justify-content-center mt-3" style="color: blue" href="{{ action('Auth\RegisterController@showRegistrationForm') }}">まだ登録がお済みでない方はこちら</a>
    </div>

</div>

@endsection
