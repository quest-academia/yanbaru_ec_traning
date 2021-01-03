<?php

namespace App\Http\Controllers;

use Illuminate\Http\Requset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
     /**
     * Route to Home
     */

    public function show()
    {
        $user = Auth::user();
        return view('auth/user_info', [ 'user' => $user ]);
        
    }

}