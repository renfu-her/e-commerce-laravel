<div class="mb-3">
    <label for="title" class="form-label">文章標題</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $blog->title ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label for="description" class="form-label">文章內容</label>
    <textarea class="form-control" name="description" rows="10" required>{{ old('description', $blog->description ?? '') }}</textarea>
    <textarea id="blog-description" style="display: none;">
        {!! old('description', $blog->description ?? '') !!}
    </textarea>
</div>

<div class="mb-3">
    <label for="author" class="form-label">作者</label>
    <input type="text" class="form-control" id="author" name="author"
        value="{{ old('author', $blog->author ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="image" class="form-label">圖片</label>
    <input type="file" class="form-control" id="image" name="image">
    @if (isset($blog) && $blog->image)
        <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" class="mt-2" style="max-width: 200px;">
    @endif
</div>

<div class="mb-3">
    <label for="published_at" class="form-label">發布時間</label>
    <input type="text" class="form-control flatpickr" id="published_at" name="published_at"
        value="{{ old('published_at', isset($blog) && $blog->published_at ? $blog->published_at->format('Y-m-d H:i') : '') }}">
</div>

<div class="mb-3 form-check">

    <label class="form-label" for="is_published">發布</label>
    <select class="form-select" id="is_published" name="is_published">
        <option value="1" {{ old('is_published', $blog->is_published ?? false) ? 'selected' : '' }}>是</option>
        <option value="0" {{ old('is_published', $blog->is_published ?? false) ? '' : 'selected' }}>否</option>
    </select>

</div>

<div class="text-center m-1">
    <button type="button" id="submit-button" class="btn btn-primary">
        @if (isset($blog))
            更新
        @else
            發布
        @endif
    </button>
    <a href="{{ route('backend.blogs.index') }}" class="btn btn-secondary ml-1">取消</a>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/zh.js"></script>
    <script>
        flatpickr(".flatpickr", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            time_24hr: true,
            locale: "zh"
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
    <script>
        $(function() {
            $('#submit-button').on('click', function() {
                @if (isset($blog))
                    var description = $('#blog-description').val();
                    $('#blog-real-description').val(description);
                @endif
                $(this).closest('form').submit();
            });
        });
    </script>
@endpush
