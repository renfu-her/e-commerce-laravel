<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 顯示登錄表單
    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    // 處理登錄請求
    public function login(Request $request)
    {
        // 驗證表單數據
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 嘗試登錄
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('backend.products.index'));
        }

        // 登錄失敗
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // 處理登出請求
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
