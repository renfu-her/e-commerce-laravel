<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Category; // 使用 Category 模型
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 顯示所有產品
    public function index()
    {
        $products = Product::with('category', 'images')->get(); // 使用 category 關聯並載入圖片
        return view('backend.products.index', compact('products'));
    }

    // 顯示創建產品表單
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('backend.products.create', compact('categories'));
    }

    // 儲存新產品
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required', // 驗證 description 欄位
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        // 創建產品
        $product = Product::create($request->all());

        // 上傳圖片
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_default' => $index == 0, // 第一張圖片作為默認圖片
                ]);
            }
        }

        return redirect()->route('backend.products.index')->with('success', '產品已成功新增.');
    }

    // 顯示編輯產品表單
    public function edit(Product $product)
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        return view('backend.products.edit', compact('product', 'categories'));
    }

    // 更新產品
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required', // 驗證 description 欄位
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $product->update($request->all());

        // 如果有新圖片上傳，刪除舊圖片並上傳新圖片
        if ($request->hasFile('images')) {
            foreach ($product->images as $image) {
                Storage::delete('public/' . $image->image_path); // 刪除舊圖片
                $image->delete(); // 刪除資料庫中的記錄
            }

            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('product_images', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'is_default' => $index == 0, // 第一張圖片作為默認圖片
                ]);
            }
        }

        return redirect()->route('backend.products.index')->with('success', '產品更新成功.');
    }

    // 刪除產品
    public function destroy(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->image_path); // 刪除圖片
            $image->delete(); // 刪除資料庫中的記錄
        }

        $product->delete();
        return redirect()->route('backend.products.index')->with('success', '產品刪除成功.');
    }
}
