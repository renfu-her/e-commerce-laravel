<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Menu;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 顯示所有產品
    public function index()
    {
        $products = Product::with('menu')->get();
        return view('backend.products.index', compact('products'));
    }

    // 顯示創建產品表單
    public function create()
    {
        $menus = Menu::all(); // 獲取所有選單，讓用戶選擇
        return view('backend.products.create', compact('menus'));
    }

    // 儲存新產品
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id', // 驗證 menu_id
        ]);

        Product::create($request->all());

        return redirect()->route('backend.products.index')->with('success', '產品已成功新增.');
    }

    // 顯示編輯產品表單
    public function edit(Product $product)
    {
        $menus = Menu::all();
        return view('backend.products.edit', compact('product', 'menus'));
    }

    // 更新產品
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'menu_id' => 'required|exists:menus,id',
        ]);

        $product->update($request->all());

        return redirect()->route('backend.products.index')->with('success', '產品更新成功.');
    }

    // 刪除產品
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('backend.products.index')->with('success', '產品刪除成功.');
    }
}
