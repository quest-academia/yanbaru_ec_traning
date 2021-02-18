@extends('layouts.app')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center font-weight-bold">商品検索画面</h3>
            </div>
        </div>
    </div>
    
    <div class="container py-2">
        <div class="row">

            <div class="col-2"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
                <table class="col-8 table table-borderless">
                    
                    {!! Form::open(['route' => 'search', 'method' => 'get']) !!}

                        @csrf
                            
                        <tbody>
                            <tr>
                                <td>{!! Form::label('keyword', '商品名', ['class' => 'p-1 align-middle', 'style' => 'font-size:large']) !!}</td>
                                <td>{!! Form::text('keyword', null, ['id' => 'keyword', 'placeholder' => 'キーワードを入力', 'style' => 'width:340px']) !!}</td>
                                <td>{!! Form::submit('検索', ['route' => 'search', 'class'=>'btn btn-primary py-1', 'type' => 'submit']) !!}</td>
                            </tr>
                            <tr class="mt-0">
                                <td>{!! Form::label('category', '商品カテゴリ', ['class' => 'p-1 align-middle', 'style' => 'font-size:large']) !!}</td>                                        
                                <td class="py-1 align-middle" style="width:420px">
                                    <div class="form-control" style="width:260px">
                                        {!! Form::select('category', ['0' => '未選択', '1' => '1', '2' => '2', '3' => '3'], '0') !!}</p>
                                    </div>
                                </td>
                            </tr> 
                        </tbody>

                    {!! Form::close() !!}

                </table>
            
                <div class="container py-2">
                    <div class="row">
                        <div class="col-2"></div>

                        @if($products->count())

                            <table class="col-8 table">
                                <tbody>
                                    <tr>
                                        <td class="p-0" style="border-style: none">全{{ count($products) }}件</td>
                                        <td style="border-style: none"></td>
                                        <td style="border-style: none"></td>
                                        <td style="border-style: none"></td>
                                    </tr>
                                    <tr>
                                        <th class="py-1 bg-warning" style="width:49%; border: 1px solid #333; border-right-style:none;">商品名</th><th class="py-1 bg-warning" style="width:17%; border: 1px solid black; border-left-style:none; border-right-style:none;">商品カテゴリ</th><th class="py-1 bg-warning" style="width:17%; border: 1px solid black; border-left-style:none; border-right-style:none;">価格</th><th class="bg-warning" style="width:17%; border: 1px solid black; border-left-style:none;"></th>
                                    </tr>

                                    @foreach ($products as $product)

                                        <tr>
                                            <td class="py-1" style="border: 1px solid #333; border-right-style:none;">{{ $product->product_name }}</td>
                                            <td class="py-1" style="border: 1px solid #333; border-left-style:none; border-right-style:none;">{{ $product->category_id }}</td>
                                            <td class="py-1" style="border: 1px solid #333; border-left-style:none; border-right-style:none;">{{ $product->price }}円</td>
                                            <td class="py-1" style="border: 1px solid #333; border-left-style:none;"><a class="py-0 btn btn-primary" href="#" role="button">商品詳細</a></td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>

                        @else

                            <table class="col-8 table">
                                <tbody>

                                    <tr>
                                        <td class="p-0" style="border-style: none">全{{ count($products) }}件</td>
                                        <td style="border-style: none"></td>
                                        <td style="border-style: none"></td>
                                        <td style="border-style: none"></td>
                                    </tr>
                                    <tr>
                                        <th class="py-1 bg-warning" style="width:49%; border: 1px solid #333; border-right-style:none;">商品名</th><th class="py-1 bg-warning" style="width:17%; border: 1px solid black; border-left-style:none; border-right-style:none;">商品カテゴリ</th><th class="py-1 bg-warning" style="width:17%; border: 1px solid black; border-left-style:none; border-right-style:none;">価格</th><th class="bg-warning" style="width:17%; border: 1px solid black; border-left-style:none;"></th>
                                    </tr>

                                </tbody>
                            </table>

                            <div class="container py-2">
                                <div class="row">
                                    <div class="col-12">
                                        <p class="p-5 text-center" style="font-size: 20px">{{ $message }}</p>
                                    </div>
                                </div>
                            </div>

                        @endif

                        
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 offset-md-3 py-2">
                        <nav aria-label="...">
                            <div class="text-center">
                                {{ $products->links('pagination::bootstrap-4') }}　<!-- 仮データが3件のため出ていませんが、5件を超えた場合ページネーションが出ることは確認できています。 -->
                            </div>
                        </nav>
                    </div>
                </div>

        </div>
    </div>

@endsection
