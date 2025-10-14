<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\payMomo.blade.php -->
@extends('welcome')

@section('content')
    <div class="container mt-4">
        <h2>Thanh toán bằng MoMo</h2>
        <table class="table table-bordered mt-3" style="backgroudnd-color:#111827;">
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
                                <img src="{{ asset('images/' . $item->image) }}" alt="Ảnh sản phẩm"
                                    style="max-width:80px;max-height:80px;">
                            @else
                                Không có ảnh
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h4 class="mt-3">Tổng tiền: <strong>{{ number_format($total) }} VND</strong></h4>
        <form action="{{ route('payment.vnpay') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success mt-3">Xác nhận thanh toán VNPAY</button>
        </form>
    </div>
@endsection