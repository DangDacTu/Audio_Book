<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\productList.blade.php -->
@extends('adminLayout')

@section('adminContent')
<section id="product-section" style="color:#fff;">
    <h2 style="margin-bottom:20px;"> Sản phẩm trên gian hàng</h2>

    <table style="width:100%; border-collapse: collapse; background-color:#1f2937; border-radius:8px; overflow:hidden;">
        <thead style="background-color:#1e293b;">
            <tr>
                <th style="padding:10px; border:1px solid #374151;">STT</th>
                <th style="padding:10px; border:1px solid #374151;">Tên sản phẩm</th>
                <th style="padding:10px; border:1px solid #374151;">Giá</th>
                <th style="padding:10px; border:1px solid #374151;">Hình ảnh</th>
                <th style="padding:10px; border:1px solid #374151;">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_category_product as $key => $product)
                <tr style="border-bottom:1px solid #374151;">
                    <td style="padding:10px;">{{ $key + 1 }}</td>
                    <td style="padding:10px;">{{ $product->category_name }}</td>
                    <td style="padding:10px;">{{ number_format($product->category_price) }}đ</td>
                    <td style="padding:10px;">
                        @if(!empty($product->category_image))
                            <img src="{{ asset('images/' . $product->category_image) }}" 
                                 alt="Ảnh sản phẩm"
                                 style="max-width:70px; max-height:70px; border-radius:6px;">
                        @else
                            <span style="color:#9ca3af;">Không có ảnh</span>
                        @endif
                    </td>
                    <td style="padding:10px;">
                        <a href="{{ route('category.edit', $product->category_id) }}" 
                           style="color:#60a5fa; text-decoration:none; margin-right:10px; font-size:20px;"
                           title="Chỉnh sửa">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('category.delete', $product->category_id) }}" 
                           onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')" 
                           style="color:#f87171; text-decoration:none; font-size:20px;"
                           title="Xóa">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($all_category_product->isEmpty())
        <p style="text-align:center; color:#9ca3af; margin-top:20px;">Không có sản phẩm nào được hiển thị.</p>
    @endif
</section>
@endsection
