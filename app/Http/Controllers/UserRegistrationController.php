<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_user;

class UserRegistrationController extends Controller
{   //ユーザー登録
    public function create(Request $request){
        M_user::create($request->all());
        return;
    }
}
