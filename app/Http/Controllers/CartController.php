<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MProduct;
use Illuminate\Foundation\Http\FormRequest;

class CartController extends Controller
{
    public function addCart(Request $request)
    {
        //セッションに保存したい変数を定義する（ここでは商品idと注文個数）
        //飛んできた$requestの中のname属性をそれぞれ指定
        $SessionProductId = $request->products_id;
        $SessionProductQuantity = $request->quantity;
        //配列の入れ物を作る（初期化）
        $SessionData = array();

        //作った配列に、compact関数を用いてidと個数の変数をまとめる（”” を使っているが変数の意味）
        $SessionData = compact("SessionProductId", "SessionProductQuantity");

        //session_dataというキーで、$SessionDataをセッションに登録
        $request->session()->push('session_data', $SessionData);
        
        return redirect()->route('cart.list');
    }

    public function CartList()
    {
        return view('cart/list');
    }

}
