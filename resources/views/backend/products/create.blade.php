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
                                            <option value="{{ $child->id }}">
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
                            <label for="quantity" class="form-label">數量</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" required>
                        </div>
                        <!-- 新增狀態字段 -->
                        <div class="mb-3">
                            <label for="status" class="form-label">狀態</label>
                            <select class="form-control" id="status" name="status" required>
                                @foreach (App\Models\Product::getStatuses() as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">上傳圖片 (可以多選)</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">描述</label>
                            <textarea class="form-control" id="description" name="description" rows="10"></textarea>
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

@push('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        $(function() {
            tinymce.init({
                selector: '#description',
                license_key: 'gpl',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                images_upload_url: '/upload-image',
                language_url: '{{ asset('tinymce/langs/zh_TW.js') }}', // path from the root of your web application — / — to the language pack(s)
                language: 'zh_TW',
                images_upload_handler: function(blobInfo, progress) {
                    return new Promise((resolve, reject) => {
                        let xhr, formData;
                        xhr = new XMLHttpRequest();
                        xhr.withCredentials = false;
                        xhr.open('POST', '{{ route('image.upload') }}');

                        // 添加 CSRF 令牌到請求頭
                        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

                        xhr.upload.onprogress = function(e) {
                            progress(e.loaded / e.total * 100);
                        };

                        xhr.onload = function() {
                            if (xhr.status === 403) {
                                reject({
                                    message: '上傳權限錯誤',
                                    remove: true
                                });
                                return;
                            }

                            if (xhr.status < 200 || xhr.status >= 300) {
                                reject('HTTP Error: ' + xhr.status);
                                return;
                            }

                            let json = JSON.parse(xhr.responseText);

                            if (!json || typeof json.location != 'string') {
                                reject('無效的 JSON 響應: ' + xhr.responseText);
                                return;
                            }

                            resolve(json.location);
                        };

                        xhr.onerror = function() {
                            reject('圖片上傳失敗，請稍後重試。');
                        };

                        formData = new FormData();
                        formData.append('image', blobInfo.blob(), blobInfo.filename());

                        xhr.send(formData);
                    });
                },
                height: 600,
                // 添加以下配置以隱藏升級提示
                promotion: false,
                branding: false,
                // 禁用自動更新檢查
                auto_update_element: false
            });
        });
    </script>
@endpush
