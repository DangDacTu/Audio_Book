<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Doanh thu</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 6px;
            text-align: left;
        }

        th {
            background: #f0f0f0;
        }

        .total {
            margin-top: 10px;
            font-weight: 700;
        }

        .meta {
            margin-bottom: 6px;
            color: #333;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <h2>Thống kê doanh thu</h2>

    <!-- Ngày xuất file PDF -->
    <p class="meta">Ngày xuất: {{ now()->format('d/m/Y H:i') }}</p>

    <p class="total">Tổng doanh thu: {{ number_format($totalRevenue) }} VND</p>

    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
            </tr>
        </thead>
        <tbody>
            @foreach($soldProducts as $k => $item)
                <tr>
                    <td>{{ $k + 1 }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ number_format($item->category_price) }} VND</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>