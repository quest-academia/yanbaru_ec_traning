@extends('layouts.app')

@section('content')
    <main>
        <div class="container">

            <div class="mx-auto">
                <h2>商品情報</h2>
                <h3>
                    @if(isset($ProductInfo->product_name))
                            {{ $ProductInfo->product_name }}
                    @endif
                </h3>
                <div class="row">
                    <div class="col-sm">
                        <div>
                            <p class="itemCategory">
                                @if(isset($ProductCategory->category_name))
                                    {{ $ProductCategory->category_name }}
                                @endif
                            </p>
                            <p>商品説明:</p>
                            <p>
                                @if(isset($ProductInfo->description))
                                    {{ $ProductInfo->description }}
                                @endif
                            </p>
                            <br>
                            <p>価格:
                                @if(isset($ProductInfo->price))
                                    {{ $ProductInfo->price }}
                                @endif
                                円
                            </p>
                        </div>
                        {!! Form::open(['route' => 'addcart']) !!}
                            
                                {{ Form::hidden('user_id', $UserId) }}
                            
                                {{ Form::hidden('ProductId', $ProductInfo->id) }}
                            
                            <div class="form-group row justify-content-center">
                                <label class="col-form-label">購入個数</label>
                                <div class="">
                                    
                                    <input type="number" class="inputNumber form-control" value="0" name="Quantity" >
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