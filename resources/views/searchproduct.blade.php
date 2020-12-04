@extends('layouts.app')

@section('content')

<main>
  <div class="container">
    <div class="mx-auto">
      <br>
      <h2 class="text-center">商品検索画面</h2>
      <br>
      <!--検索フォーム-->
      <div class="row">
        <div class="col-sm">
          <form method="GET" action="">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">商品名</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="text" class="form-control" name="productName">
              </div>
              <div class="col-sm-auto">
                <button type="search" class="btn btn-primary ">検索</button>
              </div>
            </div>     
            <!--カテゴリ選択-->
            <div class="form-group row">
              <label class="col-sm-2">商品カテゴリ</label>
              <div class="col-sm-3">
                <select id="category" name="category" class="form-control">
                  <option value="">未選択</option>
                  <option value="1">肉類</option>
                  <option value="2">魚介類</option>
                </select>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!--検索結果テーブル-->
    <div class="productTable">
      <p>全5件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
            <th style="width:50%">商品名</th>
            <th>商品カテゴリ</th>
            <th>価格</th>
            <th></th>
          </tr>
        </thead>
        <tr>
          
        </tr>
        <tr>
          <td>商品名2</td>
          <td>食料品</td>
          <td>2000円</td>
          <td><a href="#" class="btn btn-primary btn-sm">商品詳細</a></td>
        </tr>
        <tr>
          <td>商品名3</td>
          <td>食料品</td>
          <td>4000円</td>
          <td><a href="#" class="btn btn-primary btn-sm">商品詳細</a></td>
        </tr>
        <tr>
          <td>商品名4</td>
          <td>食料品</td>
          <td>500円</td>
          <td><a href="#" class="btn btn-primary btn-sm">商品詳細</a></td>
        </tr>
        <tr>
          <td>商品名5</td>
          <td>食料品</td>
          <td>1000円</td>
          <td><a href="#" class="btn btn-primary btn-sm">商品詳細</a></td>
        </tr>
      </table>
    </div>
    <!--テーブルここまで-->

    <!--ページネーション-->
    <div>
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item active">
            <span class="page-link">
              1<span class="sr-only">(current)</span>
            </span>
          </li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
        </ul>
      </nav>
    </div>
    <!--ページネーションここまで-->


  </div>
</main>

@endsection