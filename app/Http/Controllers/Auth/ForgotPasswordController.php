<?php

namespace App\Http\Controllers\Auth;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // 顯示重置密碼請求表單
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // 處理發送重置郵件的請求
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        // 發送密碼重置郵件
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // 根據返回的狀態決定後續行為
        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
