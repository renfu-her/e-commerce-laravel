@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>編輯選單</h2>

        <form action="{{ route('backend.menus.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">選單名稱</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $menu->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">描述</label>
                            <textarea class="form-control" id="description" name="description">{{ $menu->description }}</textarea>
                        </div>
                        <div class="text-center m-1">
                            <button type="submit" class="btn btn-primary">更新</button>
                            <a href="{{ route('backend.menus.index') }}" class="btn btn-secondary ml-1">取消</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
