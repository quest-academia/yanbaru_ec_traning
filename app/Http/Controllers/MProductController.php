<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MProduct;

class MProductController extends Controller
{
    public function show($id)
    {
        $m_product = MProduct::find($id);
        return view('m_product/detail',compact('m_product'));
    }

    
}