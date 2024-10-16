@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>博客文章列表</h2>
            <a class="btn btn-primary" href="{{ route('backend.blogs.create') }}">
                <i class="mdi mdi-plus"></i>
                新增文章
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table id="blogsTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>標題</th>
                    <th>作者</th>
                    <th>發布日期</th>
                    <th style="width: 17%">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->author }}</td>
                        <td>{{ $blog->published_at->format('Y-m-d') }}</td>
                        <td>
                            <a class="btn btn-info m-1" href="{{ route('backend.blogs.edit', $blog->id) }}">
                                <div class="m-2">
                                    <i class="fas fa-edit"></i>
                                    編輯
                                </div>
                            </a>
                            <form action="{{ route('backend.blogs.destroy', $blog->id) }}" method="POST"
                                class="d-inline-block" onsubmit="return confirm('您確定要刪除這篇文章嗎？');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger m-1">
                                    <div class="m-2">
                                        <i class="fas fa-trash"></i>
                                        刪除
                                    </div>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            $('#blogsTable').DataTable({
                "language": {
                    "url": '//cdn.datatables.net/plug-ins/2.1.8/i18n/zh-HANT.json',
                },
                "columnDefs": [{
                    "orderable": false,
                    "targets": -1
                }],
                "responsive": true,
                "ordering": true,
            });
        });
    </script>
@endpush
