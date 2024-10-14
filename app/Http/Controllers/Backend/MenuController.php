<?php

namespace App\Http\Controllers\Backend;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class MenuController extends Controller
{
    // 顯示所有選單
    public function index()
    {
        $menus = Menu::all();
        return view('backend.menus.index', compact('menus'));
    }

    // 顯示創建選單的表單
    public function create()
    {
        return view('backend.menus.create');
    }

    // 儲存新選單
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Menu::create($request->all());

        return redirect()->route('backend.menus.index')->with('success', '選單新增成功.');
    }

    // 顯示編輯選單的表單
    public function edit(Menu $menu)
    {
        return view('backend.menus.edit', compact('menu'));
    }

    // 更新選單
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $menu->update($request->all());

        return redirect()->route('backend.menus.index')->with('success', '選單更新成功.');
    }

    // 刪除選單
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('backend.menus.index')->with('success', '選單刪除成功.');
    }
}
