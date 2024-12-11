
        <div class="container">
            <h1>Thêm Category mới</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
            <label for="manufacturer">Tên Hãng Sản Xuất</label>
<input type="text" id="manufacturer" name="manufacturer" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Lưu</button>
        </form>
    </div>