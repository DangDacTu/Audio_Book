<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\cart.blade.php -->
@extends('welcome')
@section('content')

    <div class="cart-container">
        <h2>Giỏ hàng của bạn</h2>
        <table border="1" style="width:100%; border-collapse:collapse;">
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
                                    <img src="{{ asset('images/' . $item->image) }}" alt="Ảnh sản phẩm"
                                        style="max-width:80px;max-height:80px;">
                                @else
                                    Không có ảnh
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('cart.delete', $item->id) }}" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                    <span class="material-symbols-outlined"><i class="fa-solid fa-trash"></i></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" style="text-align:center;">Giỏ hàng trống</td>
                    </tr>
                @endif
            </tbody>
        </table>
        <div style="text-align:right;">
            <a href="/pay"><button>Thanh toán</button></a>
        </div>
    </div>

@endsection