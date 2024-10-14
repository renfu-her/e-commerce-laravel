<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CustomAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null)
    {
        // 檢查用戶是否已經登錄
        if (!Auth::check()) {
            return redirect('login'); // 如果未登錄，重定向到登錄頁
        }

        // 檢查用戶角色
        $user = Auth::user();
        if ($role && $user->role !== $role) {
            // 如果用戶角色不匹配，則返回 403 禁止訪問
            abort(403, 'Access denied');
        }

        // 通過驗證，繼續執行請求
        return $next($request);
    }
}
