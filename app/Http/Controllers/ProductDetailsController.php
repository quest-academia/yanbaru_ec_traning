<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ProductDetailsController extends Controller
{
    /*
    //商品検索画面からPOSTされたデータをviewへ送信
    public function index($id)
    {
        $user = Auth::user();
        //idでプロダクトを検索
        $product = Product::find($id);
        $category_name = Category::find($product->category_id);
        //該当商品あれば表示
        if (isset($product)) {
            return view('products.infoItem', compact('user', 'product', 'category_name'));
        }else{
            //該当商品なければ表示
            return view('products.notFoundItem', compact('user'));
        }
    }
    */
    
    //削除予定(仮データで処理)
    public function index()
    {
        $user = Auth::user();
        $products = Product::all();
        $categories = Category::all();
        
        return view('products.infoItem', compact('products', 'categories', 'user'));
    }
    
    //session保存処理
    public function addCart(Request $request)
    {
        //POSTで送信する商品IDと注文個数をセッション変数で定義&格納
        $addData = [
            'session_products_id' => $request->products_id,
            'session_products_quantity' => $request->products_quantity
        ];
        
        //cartDataが入ってない場合、そのままsessionへ（初めて商品を追加する場合）
        if (!$request->session()->has('cartData')) {
            $request->session()->push('cartData', $addData);
        }else{
            //cartDataが既に入ってる場合、まず情報取得して代入
            $sessionCartData = $request->session()->get('cartData');
            
            //代入値を番号付きでループ処理
            foreach ($sessionCartData as $key => $sessionData) {
                //もともとの入ってる商品と追加しようとする商品が同じ場合（同じ商品を追加する場合）
                if ($sessionData['session_products_id'] === $addData['session_products_id']) {
                    
                    //個数の合算処理
                    $quantity = $sessionData['session_products_quantity'] + $addData['session_products_quantity'];
                    
                    //商品のsession保存処理($keyのおかげで商品IDをキープ)
                    $request->session()->put('cartData.' . $key . '.session_products_quantity', $quantity);
                    
                    //ループ処理のストップ
                    break;
                }
            }
            //もともとの入ってる商品と追加しようとする商品が違う場合（違う商品を追加する場合）
            if ($sessionData['session_products_id'] !== $addData['session_products_id']) {
                $request->session()->push('cartData', $addData);
            }
        }
        //$keyにユーザー情報をsession保存（ユーザー情報の移動作業）
        $request->session()->put('users_id', ($request->users_id));
        //保存完了したらカート内商品一覧画面にリダイレクト
        return redirect()->route('cart.index');
    }
}