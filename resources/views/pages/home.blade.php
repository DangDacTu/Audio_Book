@extends('welcome')
@section('content')

<div>
    @foreach($products as $product)
        <div>
            <span>{{ $product->category_name }}</span><br>
            <span>{{ number_format($product->category_price) }} VND</span><br>
            <button>
                <a href="{{ url('/pay?name=' . urlencode($product->category_name) . '&price=' . $product->category_price) }}">Mua Ngay</a>
            </button>
        </div>
        <hr>
    @endforeach
</div>

@endsection