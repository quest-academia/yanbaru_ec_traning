@extends('layouts.seller_app')
@section('content')

@if (session('flash_info'))
    <div id="flash_message" class="flash_message alert alert-info">
        {{ session('flash_info') }}
    </div>
@endif
@if (session('flash_error'))
    <div id="flash_message" class="alert alert-danger">
        {{ session('flash_error') }}
    </div>
@endif

<main>
    <div class="page-header mt-5 text-center">
        <h4>商品情報登録</h4>
    </div>
    <div class="row mt-5 mb-5">
        <div class="col-sm-5 mx-auto">
            {!! Form::open(['route' => ['back_product_store']]) !!}
                <div class="form-group-sm">
                    {!! Form::label('productName', '商品名', ['class' => 'mt-2 mb-0']) !!}
                    <div class="pl-3">
                        {!! Form::text('productName', '', ['class' => 'form-control d-inline w-100']) !!}
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
                            @foreach($categories as $categoryId => $categoryName)
                                <option value="{{ $categoryId }}">
                                    {{ $categoryName }}
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
                    {!! Form::text('price', '', ['class' => 'ml-3 mr-2 form-control col-sm-8 d-inline'])."円" !!}
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('price'))
                            {{ $errors->first('price') }}
                        @endif
                    </div>
                </div>
                <div class="form-group-sm">
                    {!! Form::label('saleStatusName', '販売状態', ['class' => 'd-block mt-2 mb-0']) !!}
                    <select class="ml-3 form-control col-sm-8" name="saleStatusId">
                            @foreach($saleStatuses as $saleStatusId => $saleStatusName)
                                <option value="{{ $saleStatusId }}">
                                    {{ $saleStatusName }}
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
                            @foreach($productStatuses as $productStatusId => $productStatusName)
                                <option value="{{ $productStatusId }}">
                                    {{ $productStatusName }}
                                </option>
                            @endforeach
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
                        {!! Form::textarea('description', '', ['class' => 'form-control d-inline w-100']) !!}
                    </div>
                    <div class="mt-1 text-right text-danger">
                        @if($errors->has('description'))
                            {{ $errors->first('description') }}
                        @endif
                    </div>
                </div>
                <div>
                    <div class="w-100">
                        <div class="text-center mt-5">
                            {!! Form::submit('登録', ['class' => 'button btn btn-primary mt-2 w-25']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</main>
@endsection