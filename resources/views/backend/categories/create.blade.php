@extends('layouts.backend')

@section('content')
    <div class="container mt-1">
        <h2>新增分類</h2>
        <form action="{{ route('backend.categories.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    @include('backend.categories._form')
                </div>
            </div>
        </form>
    </div>
@endsection
