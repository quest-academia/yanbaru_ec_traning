@extends('layouts.app')

@section('content')

<<<<<<< HEAD
        <main>
       
            <div class="page-header mt-5 text-center">
                <h4>ユーザ情報修正</h4>
            </div>
            
            
                <div class="row mt-5 mb-5">
                    <div class="col-sm-6 mx-auto">
            
                    {!! Form::open(['route' => 'user/update', 'method'=>'put']) !!}
                        @method('PUT')
                        @csrf
                            <div class="form-group-sm">
                                <div class="edit-content-title">
                                    <div class="title-name">
                                        <label for="formGroupExampleInput">氏名</label>
                                    </div>
                                    <p class="title-name-text">
                                        {!! Form::label('last_name', '姓') !!}
                                    </p>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('last_name', $user->last_name, ['class' => 'form-control d-inline col-sm-4']) !!}
                                    @if($errors->has('last_name'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </p>
                                    @endif
                                    <p class="d-inline ml-1">
                                        {!! Form::label('first_name', '名') !!}
                                    </p>
                                    {!! Form::text('first_name', $user->first_name, ['class' => 'form-control d-inline col-sm-4']) !!}
                                    @if($errors->has('first_name'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>
            
                            <div class="form-group-sm">
                                <div class="edit-content-title">
                                    <div class="title-name">
                                        <label for="formGroupExampleInput">住所</label>
                                    </div>
                                    <p class="title-name-text">
                                        {!! Form::label('zipcode', '〒') !!}
                                    </p>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('zipcode', $user->zipcode, ['class' => 'form-control d-inline col-sm-6']) !!}
                                    @if($errors->has('prefecture'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('prefecture') }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-sm mb-2">
                                <div class="edit-content-title">
                                    <div class="title-address">
                                        {!! Form::label('prefecture', '都道府県') !!}
                                    </div>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('prefecture', $user->prefecture, ['class' => 'form-control d-inline col-sm-9']) !!}
                                    @if($errors->has('prefecture'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('prefecture') }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group-sm mb-2">
                                <div class="edit-content-title">
                                    <div class="title-address">
                                        {!! Form::label('municipality', '市町村区') !!}
                                    </div>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('municipality', $user->municipality, ['class' => 'form-control d-inline col-sm-9']) !!}
                                    @if($errors->has('municipality'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('municipality') }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-sm mb-2">
                                <div class="edit-content-title">
                                    <div class="title-address">
                                        {!! Form::label('address', '番地') !!}
                                    </div>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('address', $user->address, ['class' => 'form-control d-inline col-sm-9']) !!}
                                    @if($errors->has('address'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-sm mb-2">
                                <div class="edit-content-title">
                                    <div class="title-address">
                                        {!! Form::label('apartments', 'マンション名/部屋番号') !!}
                                    </div>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('apartments', $user->apartments, ['class' => 'form-control d-inline col-sm-9']) !!}
                                    @if($errors->has('apartments'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('apartments') }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group-sm mt-3">
                                <div class="edit-content-title">
                                    <div class="title-name">
                                        {!! Form::label('email', 'メールアドレス') !!}
                                    </div>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('email', $user->email, ['class' => 'form-control d-inline col-sm-12']) !!}
                                    @if($errors->has('email'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </p>
                                    @endif    
                                </div>
                            </div>
            
                            <div class="form-group-sm">
                                <div class="edit-content-title">
                                    <div class="title-name">
                                        {!! Form::label('phone_number', '電話番号') !!}
                                    </div>
                                </div>
                                <div class="edit-content-text">
                                    {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control d-inline col-sm-12']) !!}
                                    @if($errors->has('phone_number'))
                                        <p class="help-block">
                                            <strong>{{ $errors->first('phone_number') }}</strong>
                                        </p>
                                    @endif
                                </div>
                            </div>
            
                            <div class="text-center mt-5">
                                <div class="d-inline-block w-25">
                                    {!! Form::submit('修正', ['class' => 'btn btn-primary mr-5']) !!}
                                </div>

                            {!! Form::close() !!}
                            {!! Form::open(['route' => 'user/delete', 'method'=>'get', 'class' => 'd-inline-block']) !!}

                                <div class="d-inline-block">
                                    {!! Form::submit('退会', ['class' => 'btn btn-danger ml-5']) !!}
                                </div>

                            {!! Form::close() !!}
                            </div>
            
                    </div>
                </div>
=======
<main>
    <div class="page-header mt-5 text-center">
        <h4>ユーザ情報修正</h4>
    </div>
    {!! Form::open(['route' => 'user_update', 'method'=>'put']) !!}
    @method('PUT')
    @csrf
    <div class="row mt-5 mb-5">
        <div class="col-sm-6 mx-auto">

            <div class="form-group">
                {!! Form::label('last_name', '姓') !!}
                {!! Form::text('last_name', $user->last_name, ['class' => 'form-control']) !!}
                @if($errors->has('last_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('first_name', '名') !!}
                {!! Form::text('first_name', $user->first_name, ['class' => 'form-control']) !!}
                @if($errors->has('first_name'))
                <span class="help-block">
                    <strong>{{ $errors->first('first_name') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('zipcode', '郵便番号') !!}
                {!! Form::text('zipcode', $user->zipcode, ['class' => 'form-control']) !!}
                @if($errors->has('zipcode'))
                <span class="help-block">
                    <strong>{{ $errors->first('zipcode') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('prefecture', '都道府県') !!}
                {!! Form::text('prefecture', $user->prefecture, ['class' => 'form-control']) !!}
                @if($errors->has('prefecture'))
                <span class="help-block">
                    <strong>{{ $errors->first('prefecture') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('municipality', '市町村区') !!}
                {!! Form::text('municipality', $user->municipality, ['class' => 'form-control']) !!}
                @if($errors->has('municipality'))
                <span class="help-block">
                    <strong>{{ $errors->first('municipality') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('address', '番地') !!}
                {!! Form::text('address', $user->address, ['class' => 'form-control']) !!}
                @if($errors->has('address'))
                <span class="help-block">
                    <strong>{{ $errors->first('address') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('apartments', 'マンション名/部屋番号') !!}
                {!! Form::text('apartments', $user->apartments, ['class' => 'form-control']) !!}
                @if($errors->has('apartments'))
                <span class="help-block">
                    <strong>{{ $errors->first('apartments') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('email', 'メールアドレス') !!}
                {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                @if($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('phone_number', '電話番号') !!}
                {!! Form::text('phone_number', $user->phone_number, ['class' => 'form-control']) !!}
                @if($errors->has('phone_number'))
                <span class="help-block">
                    <strong>{{ $errors->first('phone_number') }}</strong>
                </span>
                @endif
            </div>

            <div class="text-center mt-5">
                {!! Form::submit('修正', ['class' => 'button btn btn-primary mt-2']) !!}

            </div>
            {!! Form::close() !!}

            {!! Form::open(['route' => 'user_delete', 'method'=>'get']) !!}
            <div class="text-center">
                {!! Form::submit('退会', ['class' => 'button btn btn-danger mt-2']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
</main>

>>>>>>> develop_alpha

        </main>
        
@endsection
