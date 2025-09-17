@extends('welcome')
@section('content')

<div>
    @foreach($products as $product)
        <div>
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