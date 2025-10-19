@extends('welcome')

@section('content')
<div class="pay-container">
    <h2>Thanh toán bằng VNPAY</h2>

    <table class="table-pay">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cart as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price) }} VND</td>
                    <td>
                        @if(!empty($item->image))
                            <img src="{{ asset('images/' . $item->image) }}" alt="Ảnh sản phẩm">
                        @else
                            <span class="no-image">Không có ảnh</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-section">
        <h4>Tổng tiền: <strong>{{ number_format($total) }} VND</strong></h4>
        <form action="{{ route('payment.vnpay') }}" method="POST">
            @csrf
            <button type="submit" class="btn-pay">💳 Xác nhận thanh toán VNPAY</button>
        </form>
    </div>
</div>

<style>
    body {
        background-color: #1e293b;
        color: #f8fafc;
        font-family: 'Poppins', sans-serif;
    }

    .pay-container {
        width: 90%;
        margin: 50px auto;
        background: #111827;
        border-radius: 16px;
        box-shadow: 0 0 30px rgba(0,0,0,0.4);
        padding: 40px 60px;
        transition: transform 0.3s ease;
    }


    h2 {
        text-align: center;
        color: #38bdf8;
        font-weight: 600;
        margin-bottom: 30px;
        font-size: 28px;
    }

    .table-pay {
        width: 100%;
        border-collapse: collapse;
        background-color: #1f2937;
        border-radius: 10px;
        overflow: hidden;
        table-layout: fixed;
    }

    .table-pay th, .table-pay td {
        padding: 14px 18px;
        text-align: center;
        font-size: 16px;
    }

    .table-pay th {
        background-color: #0f172a;
        color: #f1f5f9;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-pay tr {
        border-bottom: 1px solid #334155;
        transition: background-color 0.2s;
    }

    .table-pay tr:hover {
        background-color: #334155;
    }

    img {
        max-width: 100px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .no-image {
        color: #9ca3af;
        font-style: italic;
    }

    .total-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 30px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .total-section h4 {
        color: #facc15;
        font-size: 18px;
        margin: 0;
    }

    .btn-pay {
        background-color: #38bdf8;
        color: #fff;
        padding: 12px 22px;
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
</style>
@endsection
