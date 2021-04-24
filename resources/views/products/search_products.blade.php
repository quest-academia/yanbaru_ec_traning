
@extends('layouts.app')

@section('content')
    <main>
        <div class="container">
            <div class="mx-auto">
                <br>
                <h2>商品検索画面</h2>
                <br>
                <div class="row">
                    <div class="col-sm">
                        <form action="{{ route('search.product') }}" method="GET">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">商品名</label>
                                <div class="col-sm-5">
                                    <input type="text" name="product_name" value="{{ request('product_name') }}" class="form-control">
                                </div>
                                <div class="col-sm-auto">
                                    <button type="search" class="btn btn-primary ">検索</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2">商品カテゴリ</label>
                                <div class="col-sm-3">
                                    <select name="product_category" value="{{ request('product_category') }}" class="form-control">
                                        <option value="">未選択</option>
                                        @foreach ($allProductsCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}">{{ $productCategory->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--テーブル-->
            <div class="itemTable">
                <p>全{{ $productsDetails->count() }}件</p>
                <table class="table table-hover">
                    <thead>
                        <tr class="table-header">
                            <th style="width:50%">商品名</th>
                            <th>商品カテゴリ</th>
                            <th>価格</th>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($productsDetails as $productDetails)
                        <tr>
                            <td>{{ $productDetails->product_name }}</td>
                            <td>{{ $productDetails->Category->category_name }}</td>
                            <td>{{ $productDetails->price }}</td>
                            <td><a href="{{ route('product.show', ['id' => $productDetails->id]) }}" class="btn btn-primary btn-sm">商品詳細</a></td>
                        </tr>
                    @endforeach
                </table>
                @if ($productsDetails->count() == 0)
                    <div class="mt-5">
                        <div class="text-center">
                            <p class="h2">検索結果がありませんでした</p>
                        </div>
                    </div>
                @endif
            </div>
            <!--テーブルここまで-->
            <!--ページネーション-->
            <div>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        {{ $productsDetails->links() }}
                    </ul>
                </nav>
            </div>
            <!--ページネーションここまで-->
        </div>
    </main>
@endsection
