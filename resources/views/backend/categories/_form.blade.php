<div class="mb-3">
    <label for="name" class="form-label">分類名稱</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name ?? '') }}"
        required>
</div>
<div class="mb-3">
    <label for="parent_id" class="form-label">父分類 (可選)</label>
    <select name="parent_id" class="form-control">
        <option value="">無父分類</option>
        @foreach ($categories as $parent)
            <option value="{{ $parent->id }}"
                {{ isset($category) && $category->parent_id == $parent->id ? 'selected' : '' }}>
                {{ $parent->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="text-center m-1">
    <button type="submit" class="btn btn-primary">
        @if (isset($category))
            更新
        @else
            新增
        @endif
    </button>
    <a href="{{ route('backend.categories.index') }}" class="btn btn-secondary ml-1">取消</a>
</div>
