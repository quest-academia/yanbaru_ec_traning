<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AddController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $categories = Category::all();
        
        return view('products.newAdd', compact('categories', 'user'));
    }
    
    public function store(Request $request)
    {
        $newProduct = new Product;
        $newProduct->product_name = $request->product_name;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        $newProduct->category_id = $request->category_id;
        $newProduct->user_id = Auth::user()->id;
        $newProduct->save();
        
        return view('welcome');
    }
    

    
}
