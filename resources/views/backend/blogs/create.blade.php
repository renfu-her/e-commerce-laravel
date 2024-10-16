@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>新增文章</h2>
        <form action="{{ route('backend.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
    </script>
@endpush
