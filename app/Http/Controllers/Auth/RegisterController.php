<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // 顯示註冊表單
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // 處理註冊請求
    public function register(Request $request)
    {
        // 驗證用戶輸入的數據
        $this->validator($request->all())->validate();

        // 創建新用戶
        $user = $this->create($request->all());

        // 自動登錄新註冊用戶
        Auth::login($user);

        // 註冊成功後重定向到後端首頁或其他頁面
        return redirect()->route('backend.dashboard');
    }

    // 驗證用戶輸入
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // 創建新用戶
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
