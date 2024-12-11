<div class="container">
    <h1>Thêm sản phẩm mới</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <table class="table">
            <tr>
                <td><label for="name">Tên sản phẩm</label></td>
                <td><input type="text" class="form-control" id="name" name="name" required></td>
            </tr>
            <tr>
                <td><label for="description">Mô tả</label></td>
                <td><input type="text" class="form-control" id="description" name="description" required></td>
            </tr>
            <tr>
                <td><label for="quantity">Số lượng</label></td>
                <td><input type="number" class="form-control" id="quantity" name="quantity" min="1" required></td>
            </tr>
            <tr>
                <td><label for="price">Giá</label></td>
                <td><input type="number" class="form-control" id="price" name="price" step="0.01" min="0" required></td>
            </tr>
            <tr>
                <td><label for="category_id">Danh mục</label></td>
                <td>
                    <select class="form-control" id="category_id" name="category_id" required>
                        <option value="" disabled>Chọn danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $selectedCategoryId = $category->id ? 'selected' : '' }}>
                                {{ $category->manufacturer }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary mt-3">Lưu</button>
    </form>
</div>
