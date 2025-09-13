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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Sản phẩm A</td>
                <td>200,000đ</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sản phẩm B</td>
                <td>150,000đ</td>
            </tr>
            <!-- Thêm sản phẩm còn khác tại đây -->
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