<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\addProduct.blade.php -->
@extends('adminLayout')

@section('adminContent')
    <section id="add-section">
        <h2 class="section-title">Thêm sản phẩm</h2>
        <form action="{{ URL::to('save-category-product') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label for="ten_san_pham">Tên sản phẩm:</label>
            <input type="text" name="category_product_name" required>
            <br><br>
            <label for="gia">Giá:</label>
            <input type="number" name="category_product_price" required> đ
            <br><br>
            <label for="category_image">Hình ảnh:</label>
            <input type="file" name="category_image" accept="image/*">
            <br><br>
            <label for="category_audio">Âm thanh:</label>
            <input type="file" name="category_audio" accept="audio/*">
            <br><br>
            <button type="submit">Thêm sản phẩm</button>
        </form>
    </section>
@endsection