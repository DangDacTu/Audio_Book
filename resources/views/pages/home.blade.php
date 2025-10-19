@extends('welcome')
@section('content')

{{-- 🟣 BANNER HÌNH ẢNH TO --}}
<div style="width: 100%; margin: 20px auto; text-align: center;">
    <img src="{{ asset('images/banner_audiobook.jpg') }}" 
         alt="Banner quảng cáo"
         style="width: 100%; max-height: 400px; object-fit: cover; border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.3);">
</div>

{{-- 🟩 DANH SÁCH SẢN PHẨM --}}
<div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; padding: 20px;">
    @foreach($products as $product)
        <div class="product-card">
            @if(!empty($product->category_image))
                <img src="{{ asset('images/' . $product->category_image) }}" 
                     alt="Ảnh sản phẩm"
                     style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px;">
            @else
                <span>Không có ảnh</span><br>
            @endif

            <h4 class="book-title">{{ $product->category_name }}</h4>
            <p style="margin: 5px 0; color: #facc15;">{{ number_format($product->category_price) }} VND</p>

            <a href="{{ route('cart.add', $product->category_id) }}" class="add-to-cart-btn">
                 Thêm vào giỏ
            </a>
        </div>
    @endforeach
</div>

{{-- CSS --}}
<style>
.product-card {
  border: 1px solid #334155;
  border-radius: 12px;
  padding: 12px;
  width: 180px;
  text-align: center;
  background: #1e293b;
  color: white;
  box-shadow: 0 3px 8px rgba(0,0,0,0.3);
  transition: transform 0.2s;
}

.product-card:hover {
  transform: translateY(-4px);
}

/* 🔹 Giới hạn tên sách 1 dòng */
.book-title {
  margin: 10px 0 5px 0;
  font-size: 16px;
  font-weight: 600;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

/* 🌟 Nút thêm vào giỏ */
.add-to-cart-btn {
  display: block;
  width: 100%;
  padding: 10px 0;
  background: linear-gradient(90deg, #4f46e5, #06b6d4);
  color: #fff;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  letter-spacing: 0.5px;
  text-align: center;
  box-shadow: 0 2px 8px rgba(6,182,212,0.4);
  transition: all 0.25s ease;
  position: relative;
  overflow: hidden;
  margin-top: 10px;
}

.add-to-cart-btn:hover {
  transform: translateY(-2px) scale(1.03);
  box-shadow: 0 0 15px rgba(6,182,212,0.6);
}

.add-to-cart-btn:active {
  transform: scale(0.95);
  box-shadow: 0 0 6px rgba(6,182,212,0.3);
}

.add-to-cart-btn::after {
  content: '';
  position: absolute;
  top: 0; left: -100%;
  width: 100%; height: 100%;
  background: rgba(255,255,255,0.2);
  transform: skewX(-20deg);
  transition: left 0.5s;
}

.add-to-cart-btn:hover::after {
  left: 200%;
}
</style>

@endsection
