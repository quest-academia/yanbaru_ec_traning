<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartItemsController extends Controller
{
    /* -- viewを返す --  */
    public function index()
    {
        $product = new Product();
        $data = $product->getData();
        return view('cartitem', ['data' => $data]);
    }






    /* -- 商品削除 --  */
    //public function destroy(Request $request)
    //{
      //  return ::remove($request->id);
    //}

}
