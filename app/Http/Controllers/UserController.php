<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /*==================================
    ユーザ情報一覧
    ==================================*/
    public function show()
    {
        $user = Auth::user();
        return view('auth/user_info', [ 'user' => $user ]);
    }

    /*==================================
    ユーザ情報編集
    ==================================*/
    public function edit()
    {
        $user = Auth::user();
        return view('auth/user_edit', [ 'user' => $user ]); 
    }

    public function update(Request $request)
    {
        // ここからvalidation処理について追加
        $rules = [
            'last_name' => ['required', 'string', 'max:10'],
            'first_name' => ['required', 'string', 'max:10'],
            'zipcode' => ['required', 'numeric', 'digits:7'],
            'prefecture' => ['required', 'string', 'max:5'],
            'municipality' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:15'],
            'apartments' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'phone_number' => ['required', 'numeric', 'digits_between:4,15'],
        ];
        $this->validate($request, $rules);
        // ここまでvalidation処理について追加

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
        return view('auth/user_info', [ 'user' => $user ]);
    }

    /*==================================
    ユーザ情報削除
    ==================================*/
    public function delete(Request $request)
    {
        $user = Auth::user();
        return view('auth/user_delete', [ 'user' => $user ]);
    }

    public function remove(Request $request)
    {
        $user = Auth::user();
        $user->delete();
        return redirect('login');
    }
}