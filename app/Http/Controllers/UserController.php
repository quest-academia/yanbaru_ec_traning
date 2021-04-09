<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ユーザー情報確認画面
    public function show()
    {
        $user = Auth::user();
        return view('auth/user_info', ['user' => $user]);
    }

}
