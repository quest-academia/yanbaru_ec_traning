@extends('layouts.app')

@section('content')
  <main style="padding-bottom: 100px; margin-bottom: 2%;">
    <h3 class="text-center">ユーザ情報修正</h3>
    <div class="container mt-4" style="width: 40%;">
          {!! Form::open(['route' => ['information.update', $user->id], 'method' => 'put']) !!}
        <div class="row mt-3 pl-4">
          @method('PUT')
          <div class="col col-form-label" style="padding-left: 6%;">
            氏名
          </div>
            {!! Form::label('last_name', '姓', ['class' => 'col-form-label']) !!}

          <div class="col-3">
            {!! Form::text('last_name', $user->last_name, ['class' => 'form-control', 'style' => 'width:100%', 'require']) !!}
          </div>
            {!! Form::label('first_name', '名', ['class' => 'col-form-label']) !!}

          <div class="col-5">
            {!! Form::text('first_name', $user->first_name, ['class' => 'form-control', 'style' => 'width:65%', 'require']) !!}
          </div>
        </div>

        <div class="row mt-3">
          <div class="col col-form-label" style="padding-left: 10%;">
            住所
          </div>
            {!! Form::label('zipcode', '〒', ['class' => 'col-form-label pr-3']) !!}
          <div class="col-8">
            {!! Form::text('zipcode', $user->zipcode, ['class' => 'form-control', 'style' => 'width:50%', 'required']) !!}
          </div>
        </div>

        <div class="row mt-3">
            {!! Form::label('prefecture', '都道府県', ['class' => 'col col-form-label d-flex justify-content-end']) !!}
          <div class="col-8">
            {!! Form::text('prefecture', $user->prefecture, ['class' => 'form-control', 'style' => 'width:80%', 'require']) !!}
          </div>
        </div>

        <div class="row mt-3">
            {!! Form::label('municipality', '市町村区', ['class' => 'col col-form-label d-flex justify-content-end']) !!}
          <div class="col-8">
            {!! Form::text('municipality', $user->municipality, ['class' => 'form-control', 'style' => 'width:80%', 'require']) !!}
          </div>
        </div>

        <div class="row mt-3">
            {!! Form::label('address', '番地', ['class' => 'col col-form-label d-flex justify-content-end']) !!}
          <div class="col-8">
            {!! Form::text('address', $user->address, ['class' => 'form-control', 'style' => 'width:80%', 'require']) !!}
          </div>
        </div>

        <div class="row">
            {!! Form::label('apartments', 'マンション　部屋番号', ['class' => 'col col-form-label d-flex justify-content-end mt-1']) !!}
          <div class="col-8">
            {!! Form::text('apartments', $user->apartments, ['class' => 'form-control mt-3', 'style' => 'width:80%', 'require']) !!}
          </div>
        </div>

        <div class="row mt-3">
            {!! Form::label('email', 'メールアドレス', ['class' => 'col col-form-label']) !!}
          <div class="col-8">
            {!! Form::email('email', $user->email, ['class' => 'form-control', 'style' => 'width:100%', 'require']) !!}
          </div>
        </div>

        <div class="row mt-3">
            {!! Form::label('phone_number', '電話番号', ['class' => 'col col-form-label', 'style' => 'padding-left:7%']) !!}
          <div class="col-8">
            {!! Form::tel('phone_number', $user->phone_number, ['class' => 'form-control', 'style' => 'width:100%', 'require']) !!}
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-4">
            <div class="d-flex justify-content-end">
            {!! Form::submit('修正', ['class' => 'btn btn-primary']) !!}
            </div>
          </div>
        {!! Form::close() !!}
          <div class="col-4 offset-4">
            {!! Form::open(['route' => ['information.destroy', $user->id]]) !!}
              @method('DELETE')
              {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </div>
        </div>
    </div>
  </main>
@endsection
