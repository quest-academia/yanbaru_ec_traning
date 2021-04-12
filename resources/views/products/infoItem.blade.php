@extends('layouts.app')

@section('content')

  <main>
    <div class="container">
      <div class="mx-auto">
        
        <h2>商品情報</h2>
        <h3>{{$products[0]->product_name}}</h3>
        
        <div class="row">
          <div class="col-sm">
            <div>
              
              <p class="itemCategory">商品カテゴリ:{{$categories[0]->category_name}}</p>
             
              <p>商品説明</p>
              <p>{{$products[0]->description}}</p>
              
              <br>
              <p>価格:{{$products[0]->price}}</p>
              
            </div>
            <form class="quantitySelection" action="addCart" method="post">
              @csrf
              //session保存でカート内画面遷移時にデータを送信
              <input id="products_id" name="products_id" type="hidden" value="{{$products[0]->category_id}}">
              <input id="users_id" name="users_id" type="hidden" value="{{$user->id}}">
              
              <div class="form-group row justify-content-center">
                <label class="col-form-label">購入個数</label>
                
                  <input type="number" id="products_quantity" name="products_quantity" min="1" max="10" class="inputNumber form-control">
                
                <lavel class="col-form-label">個</lavel>
                <div class="col-sm-auto">
                  <button type="submit" class="btn btn-primary">カートへ</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>
  
@endsection