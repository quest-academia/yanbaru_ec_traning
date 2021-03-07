<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            display: flex;
            flex-flow: column;
            min-height: 100vh;
        }

        .navbar {
            box-shadow: 0px 8px 8px -5px #333;
        }

        .navbar-brand {
            display: inline-block;
            transition: all .3s ease 0s;
            text-decoration: none;
            text-align: left;
        }

        .navbar-brand:hover {
            cursor: pointer;
            transform: scale(1.2);
        }

        .nav-link {
            display: inline-block;
            transition: all .3s ease 0s;
            text-decoration: none;
            color: #333;
            text-align: right;
        }

        .nav-link:hover {
            cursor: pointer;
            transform: scale(1.2);
            color: #333;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: #ffc107;
            height: 100px;
            box-shadow: 0px -8px 8px -5px #333;
        }

        h5 {
            font-size: 21px;
            padding: 10px 5px 5px 20px;
        }


        footer p {
            text-align: right;
            font-size: 19px;
            font-weight: bold;
            margin-top: 22px;
            margin-right: 20px;
        }
    </style>
    <title>お客様情報登録</title>
</head>

<body>

    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning p-4">
            <a class="navbar-brand" href="{{ url('') }}">やんばるエキスパート</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="navbar-nav mr-auto"></ul>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('') }}">新規登録</a>
                    </li>
                </ul>
            </div>
    </header>

<main style="padding-bottom: 100px;">
    <h3 class="text-center">お客様情報登録</h3>
    <div class="container mb-5" style="width: 30%;">
    {!! Form::open(['route' => 'signup.post']) !!}

    @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif
        <div>氏名</div>

        <div class="container form-row">
          {!! Form::label('last_name', '姓', ['class' => 'col-lg-1 col-sm-3 col-form-label']) !!}
          {!! Form::text('last_name', old('last_name'), ['class' => 'col-lg-5  col-sm-9', 'style' => 'height:30px', 'required']) !!}
          {!! Form::label('first_name', '名', ['class' => 'col-lg-1 col-sm-3 col-form-label']) !!}
          {!! Form::text('first_name', old('first_name'), ['class' => 'col-lg-5 col-sm-9', 'style' => 'height:30px', 'required']) !!}
        </div>

        <div>
          {!! Form::label('zipcode', '郵便番号') !!}
        </div>
        <div class="container">
          {!! Form::text('zipcode', old('zipcode'), ['required']) !!}
        </div>

        <div>住所</div>

        <div class="container">

          <div class="form-row">
            {!! Form::label('prefecture', '都道府県', ['class' => 'col-md-3 col-form-label']) !!}
            <div class="col-md-9">
            {!! Form::text('prefecture', old('prefecture'), ['style' => 'width:100%', 'required']) !!}
            </div>
          </div>

          <div class="form-row">
            {!! Form::label('municipality', '市町村区', ['class' => 'col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
              {!! Form::text('municipality', old('municipality'), ['style' => 'width:100%', 'required']) !!}
            </div>
          </div>

          <div class="form-row">
            {!! Form::label('address', '番地', ['class' => 'col-sm-3 col-form-label']) !!}
            <div class="col-sm-9">
              {!! Form::text('address', old('address'), ['style' => 'width:100%', 'required']) !!}
            </div>
          </div>

          <div>
            {!! Form::label('apartments', 'マンション・部屋番号') !!}
            <div class="d-flex justify-content-end">
              {!! Form::text('apartments', old('apartments'), ['style' => 'width:74%', 'required']) !!}
            </div>
          </div>

        </div>

        <div>
          {!! Form::label('email', 'メールアドレス') !!}
        </div>
        <div class="container">
          {!! Form::email('email', old('email'), ['style' => 'width:100%', 'required']) !!}
        </div>

        <div>
          {!! Form::label('phone_number', '電話番号') !!}
        </div>
        <div class="container">
          {!! Form::tel('phone_number', old('phone_number'), ['style' => 'width:100%', 'required']) !!}
        </div>

        <div>
          {!! Form::label('password', 'パスワード') !!}
        </div>
        <div class="container">
          {!! Form::password('password', ['style' => 'width:80%', 'required']) !!}
        </div>

        <div>
          {!! Form::label('password_confirmation', 'パスワード再入力') !!}
        </div>
        <div class="container">
          {!! Form::password('password_confirmation', ['style' => 'width:80%', 'required']) !!}
        </div>

        <div class="d-flex justify-content-center mt-3">
          {!! Form::submit('登録', ['class' => 'btn btn-primary', 'style' => 'width:30%']) !!}
        </div>
        <p>
          <a class="d-flex justify-content-center mt-3" href="" style="color: blue;">ログインはこちらから</a>
        </p>

      {!! Form::close() !!}
    </div>
</main>
    <footer class="fixed-bottom">
        <h5>やんばるエキスパート</h5>

        <p class="copyright">© 2020 QuestAcademia, All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
