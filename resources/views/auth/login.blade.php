@extends('layouts.app')

@section('content')
    <main>
        <div class="container mt-5 text-center">
            <h2>ログイン画面</h2>
        </div>
        {!! Form::open(['route' => 'login.post']) !!}
            <form>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            {!! Form::label('email', 'メールアドレス', ['class' => 'mt-3']) !!}
                            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            {!! Form::label('password', 'パスワード', ['class' => 'mt-3']) !!}
                            {!! Form::password('password', ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <div class="row justify-content-center">
                            <div class="cal-xs-4">
                                <span style="color:red">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                    @endif
                </div>

                <div class="text-center">
                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary']) !!}
                </div>

                <div class="text-center mt-3">
                    <button type="button" class="btn btn-link">まだ登録がお済みでない方はこちら</button>
                </div>
            </form>
        {!! Form::close() !!}
    </main>
@endsection