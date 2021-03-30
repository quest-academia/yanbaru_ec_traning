<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/register.css">
  <title>ユーザ登録画面</title>
  
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


      <div class="row mt-5 mb-5">
        <div class="col-sm-5 mx-auto">

          <form>
            <div class="form-group-sm">
              <label for="formGroupExampleInput">氏名</label>

              <div class="ml-3">
                <p class="d-inline">姓</p>
                <input type="text" class="form-control-sm d-inline col-sm-5">
                <p class="d-inline ml-1">名</p>
                <input type="text" class="form-control-sm d-inline col-sm-5">
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="d-block mt-3 mb-0">郵便番号</label>
              <div class="user-info">
                <input type="text" class="form-control-sm col-sm-6">
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="mt-3">住所</label>
              <div class="clearfix">
                <p class="d-inline ml-2">都道府県</p>
                <input type="text" class="form-control-sm col-sm-8 ml-1 d-inline float-right">
              </div>
              <div class="mt-1 clearfix">
                <p class="d-inline ml-2">市町村区</p>
                <input type="text" class="form-control-sm col-sm-8 ml-1 d-inline float-right">
              </div>
              <div class="mt-1 clearfix">
                <p class="d-inline ml-2">番地</p>
                <input type="text" class="form-control-sm col-sm-8 ml-5 d-inline float-right">
              </div>
              <div class="mt-1 clearfix">
                <p class="d-block ml-2 mb-1">マンション・部屋番号</p>
                <input type="text" class="form-control-sm col-sm-8 ml-1 d-inline float-right">
              </div>
            </div>

            <div class="form-group-sm clearfix">
              <label for="formGroupExampleInput2" class="mt-3 mb-0">メールアドレス</label>
              <div class="user-info width-control">
                <input type="text" class="content-width form-control-sm d-inline">
              </div>
            </div>

            <div class="form-group-sm clearfix">
              <label for="formGroupExampleInput2" class="mt-3 mb-0">電話番号</label>
              <div class="user-info width-control">
                <input type="text" class="content-width form-control-sm d-inline">
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="d-block mt-3 mb-0">パスワード</label>
              <div class="user-info">
                <input type="text" class="form-control-sm col-sm-8">
              </div>
            </div>

            <div class="form-group-sm">
              <label for="formGroupExampleInput2" class="d-block mt-3 mb-0">パスワード再入力</label>
              <div class="user-info">
                <input type="text" class="form-control-sm col-sm-8">
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
