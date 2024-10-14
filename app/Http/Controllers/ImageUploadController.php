<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageUploadController extends Controller
{
    public function store(Request $request)
    {
        // 確保請求中包含圖片文件
        if ($request->hasFile('image')) {
            try {
                // 驗證圖片
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',  // 確保圖片符合格式
                ]);

                // 儲存圖片到 public 目錄
                $path = $request->file('image')->store('uploads', 'public');

                // 返回圖片的 URL 供 TinyMCE 插入
                return response()->json([
                    'location' => url(Storage::url($path)),
                ]);
            } catch (\Exception $e) {
                // 捕獲並記錄任何異常
                Log::error('圖片上傳失敗: ' . $e->getMessage());
                return response()->json(['error' => '圖片上傳失敗: ' . $e->getMessage()], 500);
            }
        }

        // 如果沒有上傳圖片，返回錯誤
        return response()->json(['error' => '未接收到圖片文件'], 400);
    }
}
