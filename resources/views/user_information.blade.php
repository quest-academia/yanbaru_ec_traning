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
  <title>やんばるエキスパート ECサイト</title>
</head>

<body>

  <header class="mb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand" href="{{ url('') }}">やんばるエキスパート</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="nav-bar">
        <ul class="navbar-nav mr-auto"></ul>
        <div class="d-flex flex-column">
          <p class="text-right flex-column mr-4">○○   ☓☓さん</p>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('') }}">商品検索</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('') }}">カート</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('') }}">注文履歴</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('') }}">ユーザ情報</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{ url('') }}">ログアウト</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <main style="padding-bottom: 100px;">
    <h2 class="text-center">ユーザ情報</h2>
    <div class="container" style="width: 50%;">
    <table class="table table-borderless">
        <tbody>
          <tr>
            <th class="text-center" scope="row">ユーザID</th>
            <td>{{ $user->id }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">氏名</th>
            <td>{{ $user->last_name }}　{{ $user->first_name }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">住所</th>
            <td>〒{{ $user->zipcode }}<br>{{ $user->prefecture }}{{ $user->municipality }}{{ $user->address }}　{{ $user->apartments }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">電話番号</th>
            <td>{{ $user->phone_number }}</td>
          </tr>
          <tr>
            <th class="text-center" scope="row">メールアドレス</th>
            <td>{{ $user->email }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">修正/退会する</button>
    </div>
</main>


  <footer class="fixed-bottom">
    <h5>やんばるエキスパート</h5>
    <p class="copyright">© 2020 QuestAcademia, All rights reserved.</p>
  </footer>

</body>
</html>
