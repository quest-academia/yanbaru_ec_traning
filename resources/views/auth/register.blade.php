<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title></title>
    <!--CSS-->
    <style>
        /*****リセット用CSS*****/
        * {
        box-sizing: border-box;
        /* ヘッダーやフッターを含むすべての要素の高さ＝min-height:100vhになるように指定 */
        }

        body {
        margin: 0;
        padding: 0;
        font-family: "Hiragino Kaku Gothic Pro", "ヒラギノ角ゴ Pro W3", メイリオ, Meiryo, "ＭＳ Ｐゴシック", "Helvetica Neue", Helvetica, Arial, sans-serif;
        }
        /******全体のデザイン******/
        .wrapper {
        min-height: 100vh;
        /* コンテンツの高さの最小値＝ブラウザの高さに指定 */
        position: relative;
        /* 相対位置 */
        padding-top: 70px;
        padding-bottom: 70px;
        /* ヘッダー、フッターの高さを指定 */
        }
        a {
        text-decoration: none;
        color: #4b4b4b;
        }
        /******ヘッダーデザイン******/
        header {
        width: 100%;
        padding: 10px 10px;
        background-color: #ffd900;
        position: fixed;
        top: 0;
        display: flex;
        align-items: center;
        z-index: 10;
        }
        header h1 {
        padding: 0;
        font-size: 20px;
        font-weight: bold;
        }
        header p {
        position: absolute;
        top: 0;
        right: 0;
        margin-right: 10px;
        }
        header ul {
        list-style: none;
        margin: 0;
        display: flex;
        }
        header li {
        margin: 0 0 0 15px;
        font-size: 14px;
        font-weight: bold;
        padding-top: 20px;
        }
        header nav {
        margin: 0 0 0 auto;
        }

        /****フッター*******/
        footer {
        width: 100%;
        padding: 5px 10px;
        background-color: #ffd900;
        position: absolute;
        bottom: 0;
        }
        footer h1 {
        padding: 0;
        font-size: 20px;
        font-weight: bold;
        }
        footer p {
        text-align: right;
        font-weight: bold;
        margin: 0 auto;
        }
    </style>
    </head>

    <body>
    <!--ログイン前-->
    <!--ログイン後-->
    <!--ここからヘッダー-->
    <div class="wrapper">
        <header>
        <h1><a href="#">やんばるエキスパート</a></h1>
        <nav>
            <ul>
            <li><a href="#">商品検索</a></li>
            <li><a href="#">カート</a></li>
            <li><a href="#">注文履歴</a></li>
            <li><a href="#">ユーザ情報</a></li>
            <li><a href="#">ログアウト</a></li>
            </ul>
        </nav>
        </header>
        <!--ヘッダーここまで-->
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
<!--ここからフッター-->
<footer>
        <h1>やんばるエキスパート</h1>
        <p>© 2020 QuestAcademia, All rights reserved</p>
        </footer>
    </div>
    <!--フッターここまで-->


    </body>
</html>
