@extends('layouts.app')

@section('content')
<main>

      <div class="page-header mt-5 text-center">
        <h4>お客様情報登録</h4>
      </div>

      @include('commons.error_messages') 

      <div class="row mt-5 mb-5">
        <div class="col-sm-5 mx-auto">

          <form method="POST" action="{{ route('signup.post') }}">
            @csrf
            <div class="form-group-sm">
              <label for="formGroupExampleInput">氏名</label>

              <div class="ml-3">
                <p class="d-inline">姓</p>
                <input type="text" name="last_name" class="form-control-sm d-inline col-sm-5">
                <!-- @if ($errors->has('last_name'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('last_name') }}</span>
                        </div>
                    </div>
                @endif -->
                <p class="d-inline ml-1">名</p>
                <input type="text" name="first_name" class="form-control-sm d-inline col-sm-5">
                <!-- @if ($errors->has('first_name'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('first_name') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="d-block mt-3 mb-0">郵便番号</label>
              <div class="user-info">
                <input type="text" name="zipcode" class="form-control-sm col-sm-6">
                <!-- @if ($errors->has('zipcode'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('zipcode') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="mt-3">住所</label>
              <div class="clearfix">
                <p class="d-inline ml-2">都道府県</p>
                <input type="text" name="prefecture" class="form-control-sm col-sm-8 ml-1 d-inline float-right">
                <!-- @if ($errors->has('prefecture'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('prefecture') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
              <div class="mt-1 clearfix">
                <p class="d-inline ml-2">市町村区</p>
                <input type="text" name="municipality" class="form-control-sm col-sm-8 ml-1 d-inline float-right">
                <!-- @if ($errors->has('municipality'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('municipality') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
              <div class="mt-1 clearfix">
                <p class="d-inline ml-2">番地</p>
                <input type="text" name="address" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
                <!-- @if ($errors->has('address'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('address') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
              <div class="mt-1 clearfix">
                <p class="d-block ml-2 mb-1">マンション・部屋番号</p>
                <input type="text" name="apartments" class="form-control-sm col-sm-8 ml-1 d-inline float-right">
                <!-- @if ($errors->has('apartments'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('apartments') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
            </div>

            <div class="form-group-sm clearfix">
              <label for="formGroupExampleInput2" class="mt-3 mb-0">メールアドレス</label>
              <div class="user-info width-control">
                <input type="text" name="email" class="content-width form-control-sm d-inline">
                <!-- @if ($errors->has('email'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
            </div>

            <div class="form-group-sm clearfix">
              <label for="formGroupExampleInput2" class="mt-3 mb-0">電話番号</label>
              <div class="user-info width-control">
                <input type="text" name="phone_number" class="content-width form-control-sm d-inline">
                <!-- @if ($errors->has('phone_number'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('phone_number') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="d-block mt-3 mb-0">パスワード</label>
              <div class="user-info">
                <input type="password" name="password" class="form-control-sm col-sm-8">
                <!-- @if ($errors->has('password'))
                    <div class="row justify-content-center">
                        <div class="cal-xs-4">
                            <span style="color:red">{{ $errors->first('password') }}</span>
                        </div>
                    </div>
                @endif -->
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="d-block mt-3 mb-0">パスワード再入力</label>
              <div class="user-info">
                <input type="password" name="password_confirmation" class="form-control-sm col-sm-8">
              </div>
            </div>

            <div class="text-center mt-5">
              <button type="submit" class="btn btn-primary w-50">登録</button>

              <p class="mt-5">
                <a href="#" class="text-primary d-inline">ログインはこちらから</a>
              </p>
            </div>
          </form>
        </div>
      </div>

    </main>
@endsection 
