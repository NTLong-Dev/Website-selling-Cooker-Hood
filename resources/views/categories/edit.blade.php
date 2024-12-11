<!-- resources/views/categories/edit.blade.php -->
@extends('categories.app')

@section('content')
    <div class="container">
        <h1>Chỉnh sửa Category</h1>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="manufacturer">Tên Hãng Sản Xuất</label>
                <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{ $category->manufacturer}}" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        </form>
    </div>
@endsection