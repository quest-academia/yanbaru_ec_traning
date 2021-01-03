<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserDeleteController extends Controller
{
    public function show(Request $request)
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