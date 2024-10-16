@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>編輯文章</h2>
        <form action="{{ route('backend.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('backend.blogs._form')
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            license_key: 'gpl',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            images_upload_url: '/upload-image',
            language_url: '{{ asset('tinymce/langs/zh_TW.js') }}',
            language: 'zh_TW',
            images_upload_handler: function(blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    let xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '{{ route('image.upload') }}');

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
            promotion: false,
            branding: false,
            auto_update_element: false,
            // ... 其他配置保持不變 ...
            setup: function(editor) {
                editor.on('init', function() {
                    var content = document.getElementById('product-description').value;
                    // 替換圖片路徑
                    content = content.replace(/src="\.\.\/\.\.\/storage/g, 'src="/storage');
                    editor.setContent(content);
                });
            },
            // 添加內容轉換器以處理輸出
            content_style: "img { max-width: 100%; height: auto; }",
            convert_urls: false,
            content_transformer: function(content) {
                // 在保存內容時再次替換圖片路徑
                return content.replace(/src="\.\.\/\.\.\/storage/g, 'src="/storage');
            }
        });
    </script>
@endpush
