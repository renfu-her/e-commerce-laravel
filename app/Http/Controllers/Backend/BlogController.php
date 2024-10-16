<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class BlogController extends Controller
{
    // 顯示所有文章
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blogs.index', compact('blogs'));
    }

    // 顯示創建文章的表單
    public function create()
    {
        return view('backend.blogs.create');
    }

    // 儲存新文章
    public function store(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:10240',
            'published_at' => 'nullable|date',
            'is_published' => 'boolean',
        ]);

        $data = $request->all();

        // 處理圖片上傳
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('blog_images', 'public');
        }

        // 處理發布日期
        $data['published_at'] = $request->published_at ? Carbon::parse($request->published_at) : Carbon::now();

        Blog::create($data);

        return redirect()->route('backend.blogs.index')->with('success', '文章已成功新增');
    }

    // 顯示編輯文章的表單
    public function edit(Blog $blog)
    {
        return view('backend.blogs.edit', compact('blog'));
    }

    // 更新文章
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:10240',
            'is_published' => 'required|boolean',
            'published_at' => 'nullable|date_format:Y-m-d H:i',
        ]);

        $data = $request->all();

        // 處理發布日期
        if ($request->filled('published_at')) {
            $data['published_at'] = Carbon::createFromFormat('Y-m-d H:i', $request->published_at);
        }

        // 更新圖片
        if ($request->hasFile('image')) {
            // 刪除舊圖片
            if ($blog->image) {
                Storage::delete('public/' . $blog->image);
            }
            $data['image'] = $request->file('image')->store('blog_images', 'public');
        }

        $blog->update($data);

        return redirect()->route('backend.blogs.index')->with('success', '文章已成功更新');
    }

    // 刪除文章
    public function destroy(Blog $blog)
    {
        if ($blog->image) {
            Storage::delete('public/' . $blog->image);
        }

        $blog->delete();
        return redirect()->route('backend.blogs.index')->with('success', '文章已刪除');
    }
}
