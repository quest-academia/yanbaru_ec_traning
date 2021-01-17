    @extends('layouts.app')

    @section('content')

    <main>
            
        <div class="page-header mt-5 text-center">
            <h4>お客様情報登録</h4>
        </div>
        
            
        <div class="row mt-5 mb-5">
            <div class="col-sm-5 mx-auto">
        
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group-sm">
                        <label for="formGroupExampleInput">氏名</label>
                                    
                        <div class="ml-3">
                            {!! Form::label('last_name', '姓', ['class' => 'd-inline']) !!}
                            {!! Form::text('last_name', old('last_name'), ['class' => 'form-control d-inline col-sm-5']) !!}
                            {!! Form::label('first_name', '名', ['class' => 'd-inline ml-1']) !!}
                            {!! Form::text('first_name', old('first_name'), ['class' => 'form-control d-inline col-sm-5']) !!}
                            <div class="mt-1 text-right text-danger">
                                @if($errors->has('last_name'))
                                    {{ $errors->first('last_name') }}
                                @endif
                            </div>
                        </div>
                    </div>
            
                    <div class="form-group-sm">
                        {!! Form::label('zipcode', '郵便番号', ['class' => 'd-block mt-3 mb-0']) !!}
                        <div class="user-info">
                            <div class="mt-2 text-right text-danger">
                                {!! Form::text('zipcode', old('zipcode'), ['class' => 'ml-3 form-control col-sm-6']) !!}
                                @if($errors->has('zipcode'))
                                    {{ $errors->first('zipcode') }}
                                @endif
                            </div>
                        </div>
                    </div>
                
                    <div class="form-group-sm">
                        <label for="formGroupExampleInput2" class="mt-3">住所</label>
                        <div class="clearfix">
                            {!! Form::label('prefecture', '都道府県', ['class' => 'd-inline ml-2']) !!}
                            {!! Form::text('prefecture', old('prefecture'), ['class' => 'form-control col-sm-8 ml-1 d-inline float-right']) !!}
                            <div class="mt-2 text-right text-danger">
                                @if($errors->has('prefecture'))
                                    {{ $errors->first('prefecture') }}
                                @endif
                            </div>
                        </div>
                        <div class="mt-1 clearfix">
                            {!! Form::label('municipality', '市町村区', ['class' => 'd-inline ml-2']) !!}
                            {!! Form::text('municipality', old('municipality'), ['class' => 'form-control col-sm-8 ml-1 d-inline float-right']) !!}
                            <div class="mt-2 text-right text-danger">
                                @if($errors->has('municipality'))
                                    {{ $errors->first('municipality') }}
                                @endif
                            </div>
                        </div>
                        <div class="mt-1 clearfix">
                            {!! Form::label('address', '番地', ['class' => 'd-inline ml-2']) !!}
                            {!! Form::text('address', old('address'), ['class' => 'form-control col-sm-8 ml-5 d-inline float-right']) !!}
                            <div class="mt-2 text-right text-danger">
                                @if($errors->has('address'))
                                    {{ $errors->first('address') }}
                                @endif
                            </div>
                        </div>
                        <div class="mt-1 clearfix">
                            {!! Form::label('apartments', 'マンション・部屋番号', ['class' => 'd-block ml-2 mb-1']) !!}
                            {!! Form::text('apartments', old('apartments'), ['class' => 'form-control col-sm-8 ml-1 d-inline float-right']) !!}
                        </div>
                        <div class="mt-1 text-right text-danger">
                                @if($errors->has('apartments'))
                                    {{ $errors->first('apartments') }}
                                @endif
                        </div>
                    </div>
                
                    <div class="form-group-sm">
                        {!! Form::label('email', 'メールアドレス', ['class' => 'mt-3 mb-0']) !!}
                        <div class="pl-3 text-right text-danger">
                            {!! Form::email('email', old('email'), ['class' => 'form-control d-inline w-100']) !!}
                            @if($errors->has('email'))
                                {{ $errors->first('email') }}
                            @endif
                        </div>
                    </div>
                
                    <div class="form-group-sm">
                        {!! Form::label('phone_number', '電話番号', ['class' => 'mt-3 mb-0']) !!}
                        <div class="pl-3 text-right text-danger">
                            {!! Form::text('phone_number', old('phone_number'), ['class' => 'form-control d-inline w-100']) !!}
                            @if($errors->has('phone_number'))
                                {{ $errors->first('phone_number') }}
                            @endif
                        </div>
                    </div>
                
                    <div class="form-group-sm">
                        {!! Form::label('password', 'パスワード', ['class' => 'd-block mt-3 mb-0']) !!}
                        <div class="text-right text-danger">
                            {!! Form::password('password', ['class' => 'ml-3 form-control col-sm-8']) !!}
                            @if($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                        </div>
                    </div>
                
                    <div class="form-group-sm">
                        {!! Form::label('password_confirmation', 'パスワード再入力', ['class' => 'd-block mt-3 mb-0']) !!}
                        {!! Form::password('password_confirmation', ['class' => 'ml-3 form-control col-sm-8']) !!}
                    </div>
                
                    <div class="text-center mt-5">
                        {!! Form::submit('登録', ['class' => 'btn btn-primary w-50']) !!}
                        <p class="mt-5">
                            {!! link_to_route('login', 'ログインはこちらから', [], ['class' => 'text-primary d-inline']) !!}
                        </p>
                    </div>

                {!! Form::close() !!}
        
            </div>
        </div>



    </main>

    @endsection