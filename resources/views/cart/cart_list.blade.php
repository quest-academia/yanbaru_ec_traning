<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/cart_list.css">

        <title></title>

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

            <div class="container-fluid py-3">
                <div class="row col-12 justify-content-center m-0">
                    <div class="col-12">
                        <!-- お届け先 -->
                        <div class="col-12 py-3 px-3 border border-dark rounded">
                            <h5 class="mb-0">
                                お届け先
                            </h5>
                            <div class="px-3 py-1">
                                <div class="col-12 row px-3">
                                    <div class="col-2"><span id="postal_code">〒{{$auth->zipcode}}</span></div>
                                    <div class="col-8" id="address">{{$auth->prefecture}}{{$auth->municipality}}{{$auth->address}}{{$auth->apartments}}</div>
                                </div>
                                <div class="col-12 row px-3">
                                    <div class="col-2"></div>
                                    <div class="col-8" id="name">{{$auth->last_name}} {{$auth->first_name}}<span class="ml-1">様</span></div>
                                </div>
                            </div>
                        </div>
                        <!-- カート内商品 -->
                        <div class="mt-5">
                            <table class="table border-bottom">
                                <thead>
                                    <tr class="d-flex">
                                        <th scope="col" class="col-1 px-0 py-1 text-center">No</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">商品名</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">商品カテゴリ</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">値段</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">個数</th>
                                        <th scope="col" class="col-2 px-0 py-1 text-center">小計</th>
                                        <th scope="col" class="col-1 px-0 py-1 text-center"></th>
                                    </tr>
                                </thead>
                                <tbody style="overflow-y:auto;max-height:400px;display:block">
                                    <tr class="d-flex">
                                        <th scope="row" class="col-1 px-0 text-center">1</th>
                                        <td class="col-2 px-0 text-center">商品1</td>
                                        <td class="col-2 px-0 text-center">食料品</td>
                                        <td class="col-2 px-0 text-center">1000円</td>
                                        <td class="col-2 px-0 text-center">
                                            <input class="col-5 text-right" placeholder="0" type="text" value="5"/> <span>個</span>
                                        </td>
                                        <td class="col-2 px-0 text-center">5000円</td>
                                        <td class="col-1 px-0 text-center"><button class="btn btn-danger">削除</button></td>
                                    </tr>
                                    <tr class="d-flex">
                                        <th scope="row" class="col-1 px-0 text-center">2</th>
                                        <td class="col-2 px-0 text-center">商品2</td>
                                        <td class="col-2 px-0 text-center">食料品</td>
                                        <td class="col-2 px-0 text-center">2000円</td>
                                        <td class="col-2 px-0 text-center">
                                            <input class="col-5 text-right" placeholder="0" type="text" value="2" /> <span>個</span>
                                        </td>
                                        <td class="col-2 px-0 text-center">4000円</td>
                                        <td class="col-1 px-0 text-center"><button class="btn btn-danger">削除</button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- 合計 -->
                            <div class="col-12 row justify-content-end m-0 p-0">
                                <div class="col-2 text-center px-0">合計</div>
                                <div class="col-2 text-center px-0">9000円</div>
                                <div class="col-1 text-center"></div>
                            </div>
                            <!-- ボタン -->
                            <div class="col-12 row justify-content-center mt-3">
                                <button class="btn btn-info mx-3">買い物を続ける</button>
                                <button class="btn btn-primary mx-3">注文を確定する</button>
                            </div>
                        </div>
                    </div>
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
