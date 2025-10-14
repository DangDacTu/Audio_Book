@extends('welcome')

@section('content')
    <h2>Thư viện của bạn</h2>

    <table class="table table-bordered mt-3" style="background-color:#111827;">
        <thead>
            <tr>
                <th>STT</th>
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
                            <img src="{{ asset('images/' . $item->category_image) }}" alt="Ảnh sản phẩm"
                                style="max-width:80px;max-height:80px;">
                        @else
                            Không có ảnh
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('listening') }}?id={{ $item->category_id }}" class="btn btn-success"
                            style="padding:6px 14px; border-radius:5px; color:#fff; background:#22c55e; text-decoration:none;">
                            Nghe
                        </a>
                        <form action="{{ route('library.delete', $item->category_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                style="padding:6px 14px; border-radius:5px; background:#ef4444; color:#fff; border:none; margin-left:6px;"
                                onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này khỏi thư viện?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection