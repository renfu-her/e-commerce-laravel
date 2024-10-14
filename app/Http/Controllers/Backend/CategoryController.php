<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // 顯示所有分類
    public function index()
    {
        // 獲取所有分類，並顯示子分類
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('backend.categories.index', compact('categories'));
    }

    // 顯示創建分類表單
    public function create()
    {
        // 獲取所有父分類
        $categories = Category::whereNull('parent_id')->get();
        return view('backend.categories.create', compact('categories'));
    }

    // 儲存新分類
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create($request->all());

        return redirect()->route('backend.categories.index')->with('success', '分類已成功新增.');
    }

    // 顯示編輯分類表單
    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->get(); // 獲取所有父分類
        return view('backend.categories.edit', compact('category', 'categories'));
    }

    // 更新分類
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update($request->all());

        return redirect()->route('backend.categories.index')->with('success', '分類更新成功.');
    }

    // 刪除分類
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('backend.categories.index')->with('success', '分類刪除成功.');
    }
}
