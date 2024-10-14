@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>編輯產品</h2>

        <form action="{{ route('backend.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="menu_id" class="form-label">所屬選單</label>
                            <select class="form-control" id="menu_id" name="menu_id" required>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}"
                                        {{ $menu->id == $product->menu_id ? 'selected' : '' }}>
                                        {{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">產品名稱</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">價格</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $product->price }}" required>
                        </div>
                        <div class="text-center m-1">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <a href="{{ route('backend.products.index') }}" class="btn btn-secondary">取消</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
