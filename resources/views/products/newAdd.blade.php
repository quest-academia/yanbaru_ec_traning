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
                            <!-- @if ($errors->has('product_name'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('product_name') }}</span>
                                    </div>
                                </div>
                            @endif -->
                        </div>
                    </div>
        
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">商品説明</label>
                        <div class="product-info width-control">
                            <textarea name="description" class="content-width form-control-sm"></textarea>
                            <!-- @if ($errors->has('description'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('description') }}</span>
                                    </div>
                                </div>
                            @endif -->
                        </div>
                    </div>
                    
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">価格</label>
                        <div class="product-info width-control">
                            <input type="text" name="price" class="content-half-width form-control-sm d-inline">
                            <!-- @if ($errors->has('price'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('price') }}</span>
                                    </div>
                                </div>
                            @endif -->
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
                                <!-- @if ($errors->has('category_id'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('category_id') }}</span>
                                    </div>
                                </div>
                                @endif -->
                                
                            </select>
                        </dov>
                    </div>
                    
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">商品状態</label>
                        
                        <div class="product-info width-control">
                            <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="product_status_id" onchange="entryChange2();">
                                
                                <option value="">未選択</option>
                                @foreach ($products_status as $product_status)
                                    <option value="{{ $product_status->id }}">{{ $product_status->product_status_name }}</option>
                                @endforeach
                                <!-- @if ($errors->has('product_status_id'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('product_status_id') }}</span>
                                    </div>
                                </div>
                                @endif -->
                                
                            </select>
                        </dov>
                    </div>
                    
                    <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">販売状態</label>
                        
                        <div class="product-info width-control">
                            <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="sale_status_id" onchange="entryChange2();">
                                
                                <option value="">未選択</option>
                                @foreach ($sales as $sale)
                                    <option value="{{ $sale->id }}">{{ $sale->sale_status_name }}</option>
                                @endforeach
                                <!-- @if ($errors->has('sale_status_id'))
                                <div class="row justify-content-center">
                                    <div class="cal-xs-4">
                                        <span style="color:red">{{ $errors->first('sale_status_id') }}</span>
                                    </div>
                                </div>
                                @endif -->
                                
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
