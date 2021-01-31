<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    /*==================================
    ユーザ情報一覧
    ==================================*/
    public function show()
    {
        $user = Auth::user();
        return view('auth/user_info', ['user' => $user]);
    }

    /*==================================
    ユーザ情報編集
    ==================================*/
    public function edit()
    {
        $user = Auth::user();
        return view('auth/user_edit', ['user' => $user]);
    }

    // フォームリクエストを使用してバリデーション実装
    public function update(UserRequest $request)
    {
        $user = Auth::user();
        $user->last_name = $request->last_name;
        $user->first_name = $request->first_name;
        $user->zipcode = $request->zipcode;
        $user->prefecture = $request->prefecture;
        $user->municipality = $request->municipality;
        $user->address = $request->address;
        $user->apartments = $request->apartments;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        $user = Auth::user();
        return view('auth/user_info', ['user' => $user]);
    }

    /*==================================
    ユーザ情報削除
    ==================================*/
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('auth/user_delete', ['user' => $user]);
    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $user->delete();
        return redirect('login');
    }
}
