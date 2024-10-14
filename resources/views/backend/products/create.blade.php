@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>新增產品</h2>

        <form action="{{ route('backend.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">分類</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">選擇分類</option>
                                @foreach ($categories as $parent)
                                    <optgroup label="{{ $parent->name }}">
                                        @foreach ($parent->children as $child)
                                            <option value="{{ $child->id }}"
                                                {{ isset($product) && $product->category_id == $child->id ? 'selected' : '' }}>
                                                {{ $child->name }}
                                            </option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">產品名稱</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">價格</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">上傳圖片 (可以多選)</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">描述</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="text-center m-1">
                            <button type="submit" class="btn btn-primary">新增</button>
                            <a href="{{ route('backend.products.index') }}" class="btn btn-secondary ml-1">取消</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
