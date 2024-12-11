
    <div class="container">
        <h1>Chỉnh sửa sản phẩm</h1>

        <!-- Form để cập nhật sản phẩm -->
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tên sản phẩm -->
            <div class="form-group">
                <label for="name">Tên Sản Phẩm</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="form-group">
                <label for="description">Mô tả</label>
                <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
            </div>

            <!-- Số lượng sản phẩm -->
            <div class="form-group">
                <label for="quantity">Số lượng</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}" min="1" required>
            </div>

            <!-- Giá sản phẩm -->
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" step="0.01" min="0" required>
            </div>

            <!-- Danh mục sản phẩm -->
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    <option value="" disabled>Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->manufacturer }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Nút cập nhật -->
            <button type="submit" class="btn btn-primary mt-3">Cập nhật</button>
        </form>
    </div>
