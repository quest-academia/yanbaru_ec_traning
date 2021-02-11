@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <p class="h3 text-center font-weight-bold py-4">商品情報</p>                    
                <p class="h3 text-center font-weight-bold pt-3">{{ $m_product->product_name }}</p>
                <p class="h5 text-right font-weight-bold py-3 mr-4">商品カテゴリ : {{ $m_product->category_id }}</p>               
                <ul class="py-2">
                    <li class="h5 text-left font-weight-bold">商品説明</li>
                    <li class="h5 text-left font-weight-bold">{{ $m_product->description }}</li>
                </ul>
                <p  class="h5 text-left font-weight-bold py-3">価格 : {{ $m_product->price }} 円</p>
                <form class="form-inline d-flex justify-content-center pt-5" action="/addCart" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="h5 pr-lg-1">購入個数</label>
                        <input type="number" id="number-of-unit" name="quantity" value="1" min="0" max="10" class="form-control input-number border-dark">
                        <label class="h5 px-lg-2">個</label>
                        <input type="hidden" name="products_id" value="{{ $m_product->id }}">
                        <input class="btn btn-primary py-0 px-1 mx-2" type="submit" value="カートへ">
                    </div>
                </form>            
            </div>                 
        </div>
    </div>
@endsection


