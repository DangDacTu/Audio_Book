<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\addProduct.blade.php -->
@extends('adminLayout')

@section('adminContent')
<section id="add-section" style="color:#fff; max-width:600px; margin:auto;">
    <h2 style="margin-bottom:20px;">➕ Thêm sản phẩm mới</h2>

    <form action="{{ URL::to('save-category-product') }}" method="POST" enctype="multipart/form-data" 
          style="background-color:#1e293b; padding:30px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.3);">
        {{ csrf_field() }}

        <!-- Tên sản phẩm -->
        <div style="margin-bottom:20px;">
            <label for="ten_san_pham" style="display:block; margin-bottom:8px; color:#e2e8f0;">Tên sản phẩm:</label>
            <input type="text" name="category_product_name" required
                   style="width:100%; padding:10px; border-radius:6px; border:none; background:#334155; color:#fff;">
        </div>

        <!-- Giá -->
        <div style="margin-bottom:20px;">
            <label for="gia" style="display:block; margin-bottom:8px; color:#e2e8f0;">Giá:</label>
            <input type="number" name="category_product_price" required
                   style="width:100%; padding:10px; border-radius:6px; border:none; background:#334155; color:#fff;">
        </div>

        <!-- Ảnh -->
        <div style="margin-bottom:20px;">
            <label for="category_image" style="display:block; margin-bottom:8px; color:#e2e8f0;">Hình ảnh:</label>
            <input type="file" name="category_image" accept="image/*"
                   style="width:100%; padding:8px; background:#334155; border:none; border-radius:6px; color:#fff;">
        </div>

        <!-- Âm thanh -->
        <div style="margin-bottom:20px;">
            <label for="category_audio" style="display:block; margin-bottom:8px; color:#e2e8f0;">Âm thanh:</label>
            <input type="file" name="category_audio" accept="audio/*"
                   style="width:100%; padding:8px; background:#334155; border:none; border-radius:6px; color:#fff;">
        </div>

        <!-- Nút submit -->
        <div style="text-align:center;">
            <button type="submit"
                    style="padding:10px 20px; background:#2563eb; color:#fff; border:none; border-radius:6px; cursor:pointer; transition:0.2s;">
                <i class="fas fa-plus-circle"></i> Thêm sản phẩm
            </button>
        </div>
    </form>
</section>
@endsection
