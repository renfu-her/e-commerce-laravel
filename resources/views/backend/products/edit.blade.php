@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>編輯產品</h2>

        <form action="{{ route('backend.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">分類</label>
                            <select class="form-control" id="category_id" name="category_id" required>
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
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $product->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">價格</label>
                            <input type="number" class="form-control" id="price" name="price"
                                value="{{ $product->price }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">當前圖片</label>
                            <div>
                                @foreach ($product->images as $image)
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product Image"
                                        width="100" height="100">
                                @endforeach
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="images" class="form-label">重新上傳圖片 (可以多選)</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">描述</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ $product->description }}</textarea>
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
