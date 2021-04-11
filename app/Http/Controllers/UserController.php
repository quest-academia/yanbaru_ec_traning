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
