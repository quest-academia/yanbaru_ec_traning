@extends('layouts.app')

@section('content')
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
              <div class="col-2">
                <span id="postal_code">
                  @if(Auth::check())
                  {!! Auth::user()->zipcode !!}
                  @endif
                </span>
              </div>
              <div class="col-8" id="address">
                @if(Auth::check())
                {!! Auth::user()->prefecture !!}
                {!! Auth::user()->municipality !!}
                {!! Auth::user()->address !!}
                {!! Auth::user()->apartments !!}
                @endif
              </div>
            </div>
            <div class="col-12 row px-3">
              <div class="col-2"></div>
              <div class="col-8" id="name">
                @if(Auth::check())
                {!! Auth::user()->last_name !!}
                {!! Auth::user()->first_name !!}
                @endif
                <span class="ml-1">様</span>
              </div>
            </div>
          </div>
        </div>
        <!-- カート内商品 -->
        <div class="mt-5">
          <table class="table border-dark">
            <thead>
              <tr class="d-flex border-bottom border-dark">
                <th scope="col" class="col-1 px-0 py-1 text-center">No</th>
                <th scope="col" class="col-2 px-0 py-1 text-center">商品名</th>
                <th scope="col" class="col-2 px-0 py-1 text-center">商品カテゴリ</th>
                <th scope="col" class="col-2 px-0 py-1 text-center">値段</th>
                <th scope="col" class="col-2 px-0 py-1 text-center">個数</th>
                <th scope="col" class="col-2 px-0 py-1 text-center">小計</th>
                <th scope="col" class="col-1 px-0 py-1 text-center"></th>
              </tr>
            </thead>
            @foreach($productInfo as $productNumber => $product)
            <tbody style="overflow-y:auto;max-height:400px;display:block">
              <tr class="d-flex">
                <th scope="row" class="col-1 px-0 text-center">{{ $productNumber + 1 }}</th>
                <td class="col-2 px-0 text-center">{{ $product->product_name }}</td>
                <td class="col-2 px-0 text-center">{{ $product->category->category_name }}</td>
                <td class="col-2 px-0 text-center">{{ $product->price }}円</td>
                <td class="col-2 px-0 text-center">
                  <input class="col-5 text-right"  type="text"  value="{{ $product->sessionProductQuantity }}">
                  <span>個</span>
                </td>
                <td class="col-2 px-0 text-center">5000円</td>
                <td class="col-1 px-0 text-center">
                  <form method="post" action="{{}}"><button type="submit" class="btn btn-danger">削除</button></form>
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
          <!-- 合計 -->
          <div class="col-12 row justify-content-end m-0 p-0">
            <div class="col-2 text-center px-0">合計</div>
            <div class="col-2 text-center px-0">9000円</div>
            <div class="col-1 text-center"></div>
          </div>
          <!-- ボタン -->
          <div class="col-12 row justify-content-center mt-3">
            <button class="btn btn-info mx-3">
              {!! link_to_route('show', '買い物を続ける', [], ['class' => 'text-white d-inline']) !!}
            </button>
            <button class="btn btn-primary mx-3">
              {!! link_to_route('login', '注文を確定する', [], ['class' => 'text-white d-inline']) !!}
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</main>
@endsection