@extends('layouts.app')

@section('content')
    <main>
        <div class="container">

            <div class="mx-auto">
                <h2>商品情報</h2>
                <h3>
                    @if(isset($productInfo->product_name))
                            {{ $productInfo->product_name }}
                    @endif
                </h3>
                <div class="row">
                    <div class="col-sm">
                        <div>
                            <p class="itemCategory">
                                @if(isset($productCategory->category_name))
                                    {{ $productCategory->category_name }}
                                @endif
                            </p>
                            <p>商品説明:</p>
                            <p>
                                @if(isset($productInfo->description))
                                    {{ $productInfo->description }}
                                @endif
                            </p>
                            <br>
                            <p>価格:
                                @if(isset($productInfo->price))
                                    {{ $productInfo->price }}
                                @endif
                                円
                            </p>
                        </div>
                        {!! Form::open(['route' => 'addcart']) !!}
                            
                                {{ Form::hidden('user_id', $userId) }}
                            
                                {{ Form::hidden('productId', $productInfo->id) }}
                            
                            <div class="form-group row justify-content-center">
                                <label class="col-form-label">購入個数</label>
                                <div class="">
                                    
                                    <input type="number" class="inputNumber form-control" value="0" name="quantity" >
                                </div>

                                <lavel class="col-form-label">個</lavel>
                                <div class="col-sm-auto">
                                    {!! Form::submit('カートへ', ['class' => 'btn btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                        
                    </div>
                </div>
            </div>
        
        </div>
    </main>

@endsection