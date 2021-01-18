<!DOCTYPE html>
    <html lang="ja"><head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet"　href="css/style.css">
        <title>やんばるエキスパート ECサイト</title>
    </head>
    
    <body>

        @include('commons.header')

        <h1 class="text-center py-5 font-weight-bold">やんばるエキスパート ECサイト</h1>
        <div class="d-flex justify-content-center">
            <div class="flex-row py-5 text-center mx-5">
                <p class="lead">まだアカウントを<br>お持ちでない方はこちら</p>
                <button class="btn btn-primary py-3">新規登録</button>
            </div>
            <div class="flex-row py-5 text-center mx-5">
                <p class="lead">すでにアカウントを<br>お持ちの方はこちら</p>
                <button class="btn btn-primary py-3">ログイン</button>
            </div>
        </div>

        @include('commons.footer')

    </body>
</html>