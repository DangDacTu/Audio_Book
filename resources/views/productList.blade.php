<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\productList.blade.php -->
@extends('adminLayout')

@section('adminContent')
    <section id="product-section">
        <h2>Sản phẩm trên gian hàng</h2>
        <table>
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
                @foreach ($all_category_product as $key => $product)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $product->category_name }}</td>
                        <td>{{ number_format($product->category_price) }}đ</td>
                        <td>
                            @if(!empty($product->category_image))
                                <img src="{{ asset('images/' . $product->category_image) }}" alt="Ảnh sản phẩm"
                                    style="max-width:80px;max-height:80px;">
                            @else
                                Không có ảnh
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('category.edit', $product->category_id) }}">
                                <span class="material-symbols-outlined">edit</span>
                            </a>
                            <a href="{{ route('category.delete', $product->category_id) }}"
                                onclick="return confirm('Bạn có chắc muốn xóa?')">
                                <span class="material-symbols-outlined">delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection