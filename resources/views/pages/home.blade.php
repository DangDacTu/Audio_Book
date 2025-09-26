@extends('welcome')
@section('content')

    <div>
        @foreach($products as $product)
            <div>
                @if(!empty($product->category_image))
                    <img src="{{ asset('images/' . $product->category_image) }}" alt="Ảnh sản phẩm"
                        style="max-width:120px;max-height:120px;"><br>
                @else
                    <span>Không có ảnh</span><br>
                @endif
                <span>{{ $product->category_name }}</span><br>
                <span>{{ number_format($product->category_price) }} VND</span><br>
                <button>
                    <a href="{{ route('cart.add', $product->category_id) }}">Thêm vào giỏ hàng</a>
                </button>
            </div>
            <hr>
        @endforeach
    </div>

@endsection