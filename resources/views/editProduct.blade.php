<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\editProduct.blade.php -->
@extends('adminLayout')

@section('adminContent')
    <section>
        <h2>Sửa sản phẩm</h2>
        <form action="{{ route('category.update', $product->category_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="ten_san_pham">Tên sản phẩm:</label>
            <input type="text" name="category_product_name" value="{{ $product->category_name }}" required>
            <br><br>
            <label for="gia">Giá:</label>
            <input type="number" name="category_product_price" value="{{ $product->category_price }}" required> đ
            <br><br>
            <label for="category_image">Hình ảnh:</label>
            <input type="file" name="category_image" accept="image/*">
            @if(!empty($product->category_image))
                <br>
                <img src="{{ asset('images/' . $product->category_image) }}" style="max-width:80px;max-height:80px;">
            @endif
            <br><br>
            <label for="category_audio">Âm thanh:</label>
            <input type="file" name="category_audio" accept="audio/*">
            @if(!empty($product->category_audio))
                <br>
                <audio controls src="{{ asset('audio/' . $product->category_audio) }}"></audio>
            @endif
            <br><br>
            <button type="submit">Cập nhật sản phẩm</button>
        </form>
    </section>
@endsection