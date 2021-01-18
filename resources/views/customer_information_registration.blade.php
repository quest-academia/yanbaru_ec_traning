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
      <form method="POST" action="/signup/create">
        {{ csrf_field() }}
        <div>氏名</div>

        <div class="container form-row">
          <label for="lastName" class="col-sm-1 col-form-label">姓</label>
          <input type="text" maxlength="10" class="col-md-5" id="lastName" style="height: 30px;" name="last_name" required>
          <label for="firstName" class="col-sm-1 col-form-label">名</label>
          <input type="text" maxlength="10" class="col-md-5" id="firstName" style="height: 30px;" name="first_name" required>
        </div>

        <div>
          <label for="postalCode">郵便番号</label>
        </div>
        <div class="container">
          <input type="text" pattern="" id="postalCode" name="zipcode" required>
        </div>
    <!-- \d{3}-\d{4} -->
        <div>住所</div>

        <div class="container">

          <div class="form-row">
            <label for="prefectures" class="col-md-3 col-form-label">都道府県</label>
            <div class="col-md-9">
              <input type="text" maxlength="5" id="prefectures" style="width: 100%;" name="prefecture" required>
            </div>
          </div>

          <div class="form-row">
            <label for="municipalDistrict" class="col-sm-3 col-form-label">市町村区</label>
            <div class="col-sm-9">
              <input type="text" maxlength="10" id="municipalDistrict" style="width: 100%;" name="municipality" required>
            </div>
          </div>

          <div class="form-row">
            <label for="address" class="col-sm-3 col-form-label">番地</label>
            <div class="col-sm-9">
              <input type="text" maxlength="15" id="address" style="width: 100%;" name="address" required>
            </div>
          </div>

          <div>
            <label for="apartment_roomNumber">マンション・部屋番号</label>
            <div class="d-flex justify-content-end">
              <input type="text" maxlength="20" id="apartment_roomNumber" style="width: 74%;" name="apartments" required>
            </div>
          </div>

        </div>

        <div><label for="email">メールアドレス</label></div>
        <div class="container">
          <input type="email" id="email" style="width: 100%;" name="email">
        </div>

        <div><label for="phoneNumber">電話番号</label></div>
        <div class="container">
          <input type="tel" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" id="phoneNumber" style="width: 100%;" name="phone_number" required>
        </div>

        <div><label for="password">パスワード</label></div>
        <div class="container">
          <input type="password" pattern="^([a-zA-Z0-9]{6,15})$" id="password" style="width: 80%;" name="password" required>
        </div>

        <div><label for="reenterPassword">パスワード再入力</label></div>
        <div class="container">
          <input type="password" pattern="^([a-zA-Z0-9]{6,15})$" id="emreenterPasswordail" style="width: 80%;" required>
        </div>

        <div class="d-flex justify-content-center mt-3">
          <button type="submit" class="btn btn-primary" style="width: 30%;">登録</button>
        </div>
        <p><a class="d-flex justify-content-center mt-3" href="" style="color: blue;">ログインはこちらから</a></p>

      </form>
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
