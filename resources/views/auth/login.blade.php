@extends('layouts.app')

@section('content')

    <main>
    @include('commons.error_messages') 
        <div class="container mt-5 pt-5 text-center">
            <h2>ログイン画面</h2>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="cal-xs-4">
                        <label for="email" class="mt-3">{{ __('メールアドレス') }}</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
                <!-- @if ($errors->has('email'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                @endif -->
            </div>

            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="cal-xs-4">
                        <label>{{ __('パスワード') }}</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                </div>
                <!-- @if ($errors->has('password'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                @endif -->
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('ログイン') }}
                </button>
            </div>

            <div class="text-center mt-3">
                <a href='signup'>まだ登録がお済みでない方はこちら</a>
            </div>
        </form>
    </main>
@endsection
