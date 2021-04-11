<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // ユーザー情報確認画面
    public function show()
    {
        $user = Auth::user();
        return view('auth/user_info', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('auth/user_edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'last_name' => ['required', 'string', 'max:10'],
            'first_name' => ['required', 'string', 'max:10'],
            'zipcode' => ['required', 'numeric', 'digits_between:1,7'],
            'prefecture' => ['required', 'string', 'max:5'],
            'municipality' => ['required', 'string', 'max:10'],
            'address' => ['required', 'string', 'max:15'],
            'apartments' => ['required', 'string', 'max:32'],
            'email' => ['required', 'string', 'unique:users','email'],
            'phone_number' => ['required', 'numeric', 'digits_between:1,11'],
        ]);

        $user = Auth::user();
        $user->fill($request->input());
        $user->save();
        return view('auth/user_info', ['user' => $user]);

    }

    public function delete(Request $request)
    {
        $user = Auth::user();
        $user->delete();
        return redirect('login');
    }

}
