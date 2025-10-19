@extends('welcome')

@section('content')
<div class="library-container">
    <h2> Thư viện âm thanh của bạn</h2>

    <table class="library-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($library as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>
                        @if(!empty($item->category_image))
                            <img src="{{ asset('images/' . $item->category_image) }}" alt="Ảnh sản phẩm">
                        @else
                            <span class="no-image">Không có ảnh</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('listening') }}?id={{ $item->category_id }}" 
                           class="btn-action btn-listen">
                            ▶ Nghe
                        </a>

                        <form action="{{ route('library.delete', $item->category_id) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn-action btn-delete"
                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi thư viện?')">
                                ✖ Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    body {
        background-color: #1e293b;
        color: #f8fafc;
        font-family: 'Poppins', sans-serif;
    }

    .library-container {
        width: 90%;
        margin: 50px auto;
        background: #111827;
        border-radius: 16px;
        box-shadow: 0 0 25px rgba(0,0,0,0.4);
        padding: 40px 60px;
        transition: transform 0.3s ease;
    }


    h2 {
        text-align: center;
        color: #ffffff;
        font-weight: 600;
        margin-bottom: 30px;
        font-size: 28px;
    }

    .library-table {
        width: 100%;
        border-collapse: collapse;
        background-color: #1f2937;
        border-radius: 10px;
        overflow: hidden;
        table-layout: fixed;
    }

    .library-table th, .library-table td {
        padding: 14px 18px;
        text-align: center;
        font-size: 16px;
    }

    .library-table th {
        background-color: #0f172a;
        color: #f1f5f9;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .library-table tr {
        border-bottom: 1px solid #334155;
        transition: background-color 0.2s;
    }

    .library-table tr:hover {
        background-color: #334155;
    }

    img {
        max-width: 100px;
        height: 100px;
        border-radius: 8px;
        object-fit: cover;
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .no-image {
        color: #9ca3af;
        font-style: italic;
    }

    .btn-action {
        border: none;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        transition: all 0.2s ease-in-out;
        text-decoration: none;
        display: inline-block;
    }

    .btn-listen {
        background-color: #10b981;
    }

    .btn-listen:hover {
        background-color: #059669;
        transform: scale(1.05);
    }

    .btn-delete {
        background-color: #ef4444;
        margin-left: 8px;
    }

    .btn-delete:hover {
        background-color: #dc2626;
        transform: scale(1.05);
    }
</style>
@endsection
