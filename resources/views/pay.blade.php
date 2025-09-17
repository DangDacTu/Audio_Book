<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\pay.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn Thanh Toán</title>
    <style>
        .invoice-container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
        }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
        .total { text-align: right; font-weight: bold; }
        .print-btn { width: 100%; padding: 10px; background: #007bff; color: #fff; border: none; border-radius: 4px; }
    </style>
</head>
<body>
     <a href ="{{ URL::to('/home') }}">Home</a>
     <a href ="/admin">Admin</a>
     <a href ="/pay">Giỏ hàng</a>
    <div class="invoice-container">
        <h2>Hóa Đơn Thanh Toán</h2>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @if(isset($cart) && count($cart) > 0)
                    @foreach($cart as $key => $item)
                        @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ number_format($item['price']) }} VND</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ number_format($subtotal) }} VND</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="text-align:center;">Không có sản phẩm nào trong hóa đơn</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div class="total">
            Tổng số tiền: {{ number_format($total) }} VND
        </div>
        <button class="print-btn" onclick="window.print()">In hóa đơn</button>
    </div>
</body>
</html>