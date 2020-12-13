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
          <form method="GET">
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">商品名</label>
              <!--入力-->
              <div class="col-sm-5">
                <input type="text" class="form-control" name="keyword" value="{{ $keyword }}">
              </div>
              <div class="col-sm-auto">
                <button type="submit" class="btn btn-primary ">検索</button>
              </div>
            </div>     
            <!--プルダウンカテゴリ選択-->
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
      <p>全{{ $products->total() }}件</p>
      <table class="table table-hover">
        <thead style="background-color: #ffd900">
          <tr>
            <th style="width:50%">商品名</th>
            <th>商品カテゴリ</th>
            <th>価格</th>
            <th></th>
          </tr>
        </thead>
        @foreach($products as $product)
        <tr>
          <td>{{ $product->product_name }}</td>
          <td>{{ $product->category_id }}</td>
          <td>{{ $product->price }}円</td>
          <td><a href="#" class="btn btn-primary btn-sm">商品詳細</a></td>
        </tr>
        @endforeach
      </table>
    </div>
    <!--テーブルここまで-->

    <!--ページネーション-->
    <div class="d-flex justify-content-center">
      {{ $products->links() }}
    </div>
    <!--ページネーションここまで-->


  </div>
</main>

@endsection