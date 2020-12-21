@extends('layouts.app')

@section('content')
    <main>
        <div class="container">

            <div class="mx-auto">
                <h2>商品情報</h2>
                <h3>
                    @if(isset($pd_info->product_name))
                            {{ $pd_info->product_name }}
                    @endif
                </h3>
                <div class="row">
                    <div class="col-sm">
                        <div>
                            <p class="itemCategory">
                                @if(isset($pd_category->category_name))
                                    {{ $pd_category->category_name }}
                                @endif
                            </p>
                            <p>商品説明:</p>
                            <p>
                                @if(isset($pd_info->description))
                                    {{ $pd_info->description }}
                                @endif
                            </p>
                            <br>
                            <p>価格:
                                @if(isset($pd_info->price))
                                    {{ $pd_info->price }}
                                @endif
                                円
                            </p>
                        </div>
                        {!! Form::open(['route' => 'addcart']) !!}
                            
                                {{ Form::hidden('user_id', $user_id) }}
                            
                                {{ Form::hidden('product_id', $pd_info->id) }}
                            
                            <div class="form-group row justify-content-center">
                                <label class="col-form-label">購入個数</label>
                                <div class="">
                                    
                                    <input type="number" class="inputNumber form-control" value="0" name="productQty" >
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