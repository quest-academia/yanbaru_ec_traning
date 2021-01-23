@extends('layouts.seller_app')
@section('content')
<main>
        
    <div class="page-header mt-5 text-center">
        <h4>商品情報修正</h4>
    </div>
    
        
    <div class="row mt-5 mb-5">
        <div class="col-sm-5 mx-auto">
    
            {!! Form::open(['route' => ['back_product_update', $product->id]]) !!}
            {{ method_field('PUT') }}
            
                
                <div class="form-group-sm">
                    {!! Form::label('productName', '商品名', ['class' => 'mt-2 mb-0']) !!}
                    <div class="pl-3">
                        {!! Form::text('productName', $product->product_name, ['class' => 'form-control d-inline w-100']) !!}
                    </div>
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('productName'))
                            {{ $errors->first('productName') }}
                        @endif
                    </div>
                </div>
            
                <div class="form-group-sm">
                    {!! Form::label('categoryName', '商品カテゴリ', ['class' => 'mt-2 mb-0']) !!}
                    <div class="pl-3">
                        <select class="form-control d-inline w-100" name="categoryId">
                        <option value={{ $categoryId }}>{{ $categoryName }}</option>
                            @foreach($categories as $id => $category_Name)
                                <option value={{ $id }}>
                                    {{ $category_Name }}
                                </option>  
                            @endforeach, 
                        </select>
                    </div>
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('categoryId'))
                            {{ $errors->first('categoryId') }}
                        @endif
                    </div>
                </div>
                
                <div class="form-group-sm">
                    {!! Form::label('price', '販売単価', ['class' => 'd-block mt-2 mb-0']) !!}
                    {!! Form::text('price', $product->price, ['class' => 'ml-3 mr-2 form-control col-sm-8 d-inline'])."円" !!}
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('price'))
                            {{ $errors->first('price') }}
                        @endif
                    </div>
                </div>
            
                <div class="form-group-sm">
                    {!! Form::label('saleStatusName', '販売状態', ['class' => 'd-block mt-2 mb-0']) !!}
                    <select class="ml-3 form-control col-sm-8" name="saleStatusId">
                        <option value="{{ $saleStatusId }}">{{ $saleStatusName }}</option>
                            @foreach($saleStatuses as $id => $sale_StatusName)
                                <option value="{{ $id }}">
                                    {{ $sale_StatusName }}
                                </option>  
                            @endforeach, 
                    </select>
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('saleStatusId'))
                            {{ $errors->first('saleStatusId') }}
                        @endif
                    </div>
                </div>

                <div class="form-group-sm">
                    {!! Form::label('productStatusName', '商品状態', ['class' => 'd-block mt-2 mb-0']) !!}
                    <select class="ml-3 form-control col-sm-8" name="productStatusId">
                        <option value="{{ $productStatusId }}">{{$productStatusName}}</option>
                            @foreach($productStatuses as $id => $product_StatusName)
                                <option value="{{ $id }}">
                                    {{ $product_StatusName }}
                                </option>  
                            @endforeach, 
                    </select>
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('productStatusId'))
                            {{ $errors->first('productStatusId') }}
                        @endif
                    </div>
                </div>

                <div class="form-group-sm">
                    {!! Form::label('description', '商品説明', ['class' => 'mt-2 mb-0']) !!}
                    <div class="pl-3">
                        {!! Form::textarea('description', $product->description, ['class' => 'form-control d-inline w-100']) !!}
                    </div>
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('description'))
                            {{ $errors->first('description') }}
                        @endif
                    </div>
                </div>

                <div>
                    <div class="w-50 float-left">
                        <div class="text-center mt-5"> 
                            {!! Form::submit('修正', ['class' => 'button btn btn-primary mt-2']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}

                    {!! Form::open(['route' => ['back_product_delete', $product->id]]) !!}
                    {{ method_field('DELETE') }}
                    <div class="w-50 float-right">
                        <div class="text-center mt-5">
                            {!! Form::submit('削除', ['class' => 'button btn btn-danger mt-2']) !!}
                        </div>
                    </div>
                </div> 
            {!! Form::close() !!}

        </div>
    </div>



</main>

@endsection