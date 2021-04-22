@extends('layouts.app')

@section('content')
    <main>

        <div class="page-header mt-5 text-center">
            <h2>商品追加</h2>
        </div>
        
        <div class="row mt-5 mb-5">
            <div class="col-sm-5 mx-auto">
                <form method="POST" action="{{ route('newProduct.post') }}">
                    @csrf
                    
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">商品名</label>
                        <div class="product-info width-control">
                            <input type="text" name="product_name" class="content-half-width form-control-sm d-inline">
                        </div>
                    </div>
        
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">商品説明</label>
                        <div class="product-info width-control">
                            <textarea name="description" class="content-width form-control-sm"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">価格</label>
                        <div class="product-info width-control">
                            <input type="text" name="price" class="content-half-width form-control-sm d-inline">
                        </div>
                    </div>
                    
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">商品カテゴリー</label>
                        
                        <div class="product-info width-control">
                            <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="category_id" onchange="entryChange2();">
                                
                                <option value="">未選択</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                                
                            </select>
                        </dov>
                    </div>
                    
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary w-50">追加</button>
                        <p class="mt-5">
                            <a href="#" class="text-primary d-inline">商品一覧</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection
