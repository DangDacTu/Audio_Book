<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\cart.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <style>
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        .cart-container { max-width: 700px; margin: 40px auto; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <div class="cart-container">
        <h2>Giỏ hàng của bạn</h2>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($cart) && count($cart) > 0)
                    @foreach($cart as $key => $item)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price) }} VND</td>
                    <td>1</td>
                    <td>{{ number_format($item->price) }} VND</td>
                    <td>
                        <a href="{{ route('cart.delete', $item->id) }}" onclick="return confirm('Bạn có chắc muốn xóa?')">
                            <span class="material-symbols-outlined">delete</span>
                        </a>
                    </td>
                </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" style="text-align:center;">Giỏ hàng trống</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div style="text-align:right;">
            <a href="/pay"><button>Thanh toán</button></a>
        </div>
    </div>
</body>
</html>