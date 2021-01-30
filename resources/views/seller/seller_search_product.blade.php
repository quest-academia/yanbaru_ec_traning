@extends('layouts.seller_app')

@section('content')

<div class="container">
    <div class="mt-5">
        <h2 class="text-center">商品検索画面</h2>
    </div>

    <div class="row">
        <div class="col">
            <form method="GET" action= "{{ route('seller_search') }}" >
                <div class="form-group row mt-3">
                    <label class="col-sm-2 col-form-label">商品名</label>
                
                    <!-- 検索ワード入力 -->
                    <div class="col-sm-7 ml-3">
                        <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">
                    </div>

                    <!-- 検索ボタン -->
                    <div class="col-sm-auto">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">商品カテゴリ</label>

                    <!-- プルダウン -->
                    <div class="col-sm-5 ml-3">
                        <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                            <option value="">未選択</option>
                            @foreach($categories as $id => $category_name)
                            <option value="{{ $id }}">{{ $category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            <!-- 商品一覧初期表示/検索結果一覧を表示させる-->
            @if(!empty($products))
            <div class="">
                    <p>全{{ $products->count() }}件</p>
                </div>
            <div class="productTable">
            
            <table class="table table-hover">
                <thead class="text-white bg-dark">
                    <tr>
                        <th>商品名</th>
                        <th>商品カテゴリ</th>
                        <th>価格</th>
                    </tr>
                </thead>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category->category_name }}</td>
                    <td>{{ $product->price }}円</td>
                    <td>{!! link_to_route('back_product_edit', '修正', [$product->id], ['class' => 'btn btn-primary mt-2']) !!}</td>
                </tr>
                @endforeach
            </table>
            </div>
            
            <!-- ページネーション -->
            <div class="d-flex justify-content-center">
                {{ $products->appends(request()->input())->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection