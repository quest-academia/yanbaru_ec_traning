<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            // 会員登録ページやログインページのmiddlewareで会員状態をチェックしてリダイレクト先を出し分ける
            $can_edit_flag = Auth::guard()->user()->user_classification_id;
            if ($can_edit_flag == config('const.USER_CLASSIFICATIONS.SELLER')
                || $can_edit_flag == config('const.USER_CLASSIFICATIONS.ADMIN')
                ) {
                // 編集可能ユーザー;
                return redirect('/seller/items');
            } else {
                // 一般購入ユーザー;
                return redirect('/home');
            }
        }

        return $next($request);
    }
}
