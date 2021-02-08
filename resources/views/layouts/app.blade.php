<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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

        ul {
            list-style: none;
            margin-left: 0;
            padding-left: 0;
        }

        .container-fluid {
            margin-right: auto;
            margin-left: auto;
            max-width: 40em;
        }

        .navbar {
            box-shadow: 0px 8px 8px -5px #333;
        }

        .navbar-nav {
            display: flex;
            justify-content: flex-start;
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

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-warning py-2">
            <a class="navbar-brand" href="{{ url('') }}">やんばるエキスパート</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar" >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
                <ul class="navbar-nav mr-auto"></ul>
                <div class="d-flex flex-column">
                    <p class="text-right flex-column mr-2">○○ xxさん</p>
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

    

<main class="py-4">
  @yield('content')
</main>

<footer>
        <h5>やんばるエキスパート</h5>
        <p class="copyright">© 2020 QuestAcademia, All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

</body>
</html>