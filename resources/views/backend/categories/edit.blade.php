@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>編輯分類</h2>
        <form action="{{ route('backend.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    @include('backend.categories._form')
                </div>
            </div>
        </form>
    </div>
@endsection
