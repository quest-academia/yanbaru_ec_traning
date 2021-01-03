<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserEditController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('auth/user_edit', [ 'user' => $user ]); 
    }

    public function update(Request $request)
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
        return view('auth/user_info', [ 'user' => $user ]);

    }
}


