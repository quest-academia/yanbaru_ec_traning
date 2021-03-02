@extends('layouts.app')

@section('content')

    <div class="container pt-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center font-weight-bold">商品検索画面</h3>
            </div>
        </div>
    </div>
    
    <div class="container py-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>

            <table class="col-8 table table-borderless">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-sm">
                        <form method="GET" action="{{ route('search')}}">
                            <div class="form-group row">
                                <tr>
                                    <td>
                                        <label class="p-1 align-middle col-form-label" style="width:150px; font-size: large;">商品名</label>
                                    </td>
                                    <td class="col-sm-5">
                                        <input type="text" class="form-control" name="keyword" value="{{ $keyword }}">
                                    </td>
                                    <td class="p-1 align-middle">
                                        <button type="submit" class="btn btn-primary py-1" style="width:60px;">検索</button>
                                    </td>
                                </tr>
                            </div>     

                            <div class="form-group row">
                                <td>
                                    <label class="p-1 align-middle" style="width:150px; font-size: large;">商品カテゴリ</label>
                                </td>
                                <td class="py-1 align-middle" style="width:350px">
                                    <select name="categoryId" class="form-control" style="width:210px; display: inline;" value="{{ $categoryId }}">
                                        <option value="">未選択</option>
                
                                        @foreach ($categories as $id => $category_name)
                                    
                                            <option value="{{ $id }}">{{ $category_name }}</option>
                                        
                                        @endforeach
                                    </select>
                                </td>
                            </div>
                        </form>
                    </div>
                </div>
            </table>
                    
            <div class="container">
                <div class="row">
                    <div class="col-2"></div>

                    @if ($products->count())

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
                                        <td class="py-1" style="border: 1px solid #333; border-left-style:none; border-right-style:none;">{{ $product->category->category_name }}</td>
                                        <td class="py-1" style="border: 1px solid #333; border-left-style:none; border-right-style:none;">{{ $product->price }}円</td>
                                        <td class="py-1" style="border: 1px solid #333; border-left-style:none;"><a class="py-0 btn btn-primary" href="{{ route('detail', ['id' => $product->id])}}" role="button">商品詳細</a></td>
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

                        <div class="container py-5">
                            <div class="row">
                                <div class="col-12">
                                    <p class="py-5 text-center" style="font-size: 20px">{{ $message }}</p>
                                </div>
                            </div>
                        </div>

                    @endif
        
                </div>
            </div>

            <div class="col-5"></div>
                
            <div class="row">
                <div class="col-6 offset-md-3 py-2">
                    <div class="text-center">
                        <ul class="pagination justify-content-center">
                            <li>{{ $products->links('pagination::bootstrap-4') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
