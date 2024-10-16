@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>產品列表</h2>
            <a class="btn btn-primary" href="{{ route('backend.products.create') }}">
                <i class="mdi mdi-plus"></i>
                新增產品
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table id="productsTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>分類</th>
                    <th>名稱</th>
                    <th>價格</th>
                    <th style="width: 17%">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            {{ $product->category->parent ? $product->category->parent->name . '->' : '' }}
                            {{ $product->category->name }}
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <a class="btn btn-info m-1" href="{{ route('backend.products.edit', $product->id) }}">
                                <div class="m-2">
                                    <i class="fas fa-edit"></i>
                                    編輯
                                </div>
                            </a>
                            <form action="{{ route('backend.products.destroy', $product->id) }}" method="POST"
                                class="d-inline-block" onsubmit="return confirm('您確定要刪除這個產品嗎？');">
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
    <style>

    </style>
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            $('#productsTable').DataTable({
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
