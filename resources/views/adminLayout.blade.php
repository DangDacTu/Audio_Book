<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Quản lý sản phẩm</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        .section-title { margin-top: 30px; }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>
<body>
    <div style="text-align:right;">
        <form action="{{ url('/logout') }}" method="GET">
            @csrf
            <button type="submit">Đăng xuất</button>
        </form>
    </div>

    @yield('adminContent')

    <h2>Sản phẩm còn</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_category_product as $key => $product)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $product->category_name }}</td>
                <td>{{ number_format($product->category_price) }}đ</td>
                <td>
                    <a href="{{ route('category.delete', $product->category_id) }}" onclick="return confirm('Bạn có chắc muốn xóa?')">
                        <span class="material-symbols-outlined">delete</span>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2 class="section-title">Sản phẩm đã bán</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Sản phẩm C</td>
                <td>180,000đ</td>
            </tr>
            <!-- Thêm sản phẩm đã bán khác tại đây -->
        </tbody>
    </table>

    <h2 class="section-title">Thêm sản phẩm mới vào trang bán hàng</h2>
    <form action="{{ URL::to('save-category-product') }}" method="POST">
        {{ csrf_field() }}
        <label for="ten_san_pham">Tên sản phẩm:</label>
        <input type="text" name="category_product_name" required>
        <br><br>
        <label for="gia">Giá:</label>
        <input type="number" name="category_product_price" required> đ
        <br><br>
        <button type="submit">Thêm sản phẩm</button>
    </form>
</body>
</html>