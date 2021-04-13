@extends('layouts.app')

@section('content')

    <main>
        <div class="page-header mt-5 text-center">
            <h4>ユーザ情報修正</h4>
        </div>
        <div class="row mt-5 mb-5">
            <div class="col-sm-6 mx-auto">
                <form method="POST" action="{{ route('user.update') }}">
                    @csrf
                    @method("PUT")
                    <div class="form-group-sm">
                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">氏名</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <p class="d-inline ml-1">姓</p>
                            <input type="text" name="last_name" class="form-control-sm d-inline col-sm-4" value="{{ $user->last_name }}">
                                @if ($errors->has('last_name'))
                                    <div class="row justify-content-center">
                                        <div class="cal-xs-4">
                                            <span style="color:red">{{ $errors->first('last_name') }}</span>
                                        </div>
                                    </div>
                                @endif
                            <p class="d-inline ml-1">名</p>
                            <input type="text" name="first_name" class="form-control-sm d-inline col-sm-4" value="{{ $user->first_name }}">
                                @if ($errors->has('first_name'))
                                    <div class="row justify-content-center">
                                        <div class="cal-xs-4">
                                            <span style="color:red">{{ $errors->first('first_name') }}</span>
                                        </div>
                                    </div>
                                @endif
                        </div>

                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">住所</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <p class="d-inline ml-1">〒</p>
                            <input type="text" name="zipcode" class="form-control-sm d-inline col-sm-6" value="{{ $user->zipcode }}">
                                @if ($errors->has('zipcode'))
                                    <div class="row justify-content-center">
                                        <div class="cal-xs-4">
                                            <span style="color:red">{{ $errors->first('zipcode') }}</span>
                                        </div>
                                    </div>
                                @endif
                        </div>
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput">都道府県</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" name="prefecture" class="form-control-sm d-inline col-sm-9" value="{{ $user->prefecture }}">
                                @if ($errors->has('prefecture'))
                                    <div class="row justify-content-center">
                                        <div class="cal-xs-4">
                                            <span style="color:red">{{ $errors->first('prefecture') }}</span>
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>

                    <div class="form-group-sm mb-2">
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput">市町村区</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" name="municipality" class="form-control-sm d-inline col-sm-9" value="{{ $user->municipality }}">
                                @if ($errors->has('municipality'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('municipality') }}</span>
                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>

                    <div class="form-group-sm mb-2">
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput">番地</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" name="address" class="form-control-sm d-inline col-sm-9" value="{{ $user->address }}">
                                @if ($errors->has('address'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('address') }}</span>
                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>

                    <div class="form-group-sm mb-2">
                        <div class="edit-content-title">
                            <div class="title-address">
                                <label for="formGroupExampleInput" id="address-text">マンション<br>部屋番号</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" name="apartments" class="form-control-sm d-inline col-sm-9" value="{{ $user->apartments }}">
                                @if ($errors->has('apartments'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('apartments') }}</span>
                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>

                    <div class="form-group-sm mt-3">
                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">メールアドレス</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" name="email" class="form-control-sm d-inline col-sm-12" value="{{ $user->email }}">
                                @if ($errors->has('email'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('email') }}</span>
                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>

                    <div class="form-group-sm">
                        <div class="edit-content-title">
                            <div class="title-name">
                                <label for="formGroupExampleInput">電話番号</label>
                            </div>
                        </div>
                        <div class="edit-content-text">
                            <input type="text" name="phone_number" class="form-control-sm d-inline col-sm-12" value="{{ $user->phone_number }}">
                                @if ($errors->has('phone_number'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('phone_number') }}</span>
                                    </div>
                                </div>
                                @endif
                        </div>
                    </div>

                    <div class="d-inline-flex　text-center mt-5">
                        <button type="submit" class="btn btn-primary w-25 mr-5">修正</button>
                    </div>
                </form>
                <form method="GET" action="{{ route('user.delete') }}">
                    <div class="d-inline-flex　text-center mt-5">
                        <button type="submit" class="btn btn-danger w-25 ml-5">退会</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
<!-- @endsection -->
