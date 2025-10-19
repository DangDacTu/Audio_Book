<!-- filepath: resources/views/cart.blade.php -->
@extends('welcome')
@section('content')

<style>
    body {
        background-color: #1e293b;
        color: #f8fafc;
        font-family: 'Poppins', sans-serif;
    }

    .cart-container {
        width: 90%; /* ✅ Chiếm toàn bộ chiều ngang */
        margin: 40px auto;
        background: #111827;
        border-radius: 16px;
        box-shadow: 0 0 30px rgba(0,0,0,0.4);
        padding: 40px 50px;
        transition: 0.3s ease;
    }

    h2 {
        text-align: center;
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 30px;
        font-size: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #1f2937;
        border-radius: 10px;
        overflow: hidden;
        table-layout: fixed; /* giúp các cột đều hơn */
    }

    th, td {
        padding: 14px 18px;
        text-align: center;
        font-size: 16px;
        word-wrap: break-word;
    }

    th {
        background-color: #0f172a;
        color: #f1f5f9;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    tr {
        border-bottom: 1px solid #334155;
        transition: background-color 0.2s;
    }

    tr:hover {
        background-color: #334155;
    }

    img {
        max-width: 100px; /* ✅ ảnh lớn hơn cho full-width */
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .delete-btn {
        color: #ef4444;
        font-size: 20px;
        text-decoration: none;
        transition: 0.2s;
    }

    .delete-btn:hover {
        color: #f87171;
        transform: scale(1.1);
    }

    .total {
        text-align: right;
        margin-top: 30px;
        font-size: 18px;
        color: #facc15;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 15px;
    }

    .btn-pay {
        background-color: #38bdf8;
        color: #fff;
        padding: 10px 18px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.3s, transform 0.2s;
    }

    .btn-pay:hover {
        background-color: #0ea5e9;
        transform: scale(1.05);
    }

    .empty-cart {
        text-align: center;
        color: #94a3b8;
        font-style: italic;
    }
</style>


<div class="cart-container">
    <h2> Giỏ hàng của bạn</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($cart) && count($cart) > 0)
                @foreach($cart as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price) }} VND</td>
                        <td>
                            @if(!empty($item->image))
                                <img src="{{ asset('images/' . $item->image) }}" alt="Ảnh sản phẩm">
                            @else
                                Không có ảnh
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('cart.delete', $item->id) }}" class="delete-btn" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="empty-cart">Giỏ hàng trống</td>
                </tr>
            @endif
        </tbody>
    </table>

    <div class="total">
        <strong>Tổng tiền: {{ number_format($total) }} VND</strong>
        <a href="{{ route('pay.momo') }}">
            <button type="button" class="btn-pay">Thanh toán bằng VNPAY</button>
        </a>
    </div>
</div>

@endsection
