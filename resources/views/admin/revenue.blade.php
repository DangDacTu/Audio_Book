@extends('adminLayout')
@section('adminContent')
    <h1>Thống kê doanh thu</h1>
    <div style="margin: 30px 0;">
        <h3>Tổng doanh thu: <span style="color:#007bff;">{{ number_format($totalRevenue) }} VND</span></h3>
    </div>
    <h4>Chi tiết sản phẩm đã bán:</h4>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Ngày bán</th>
            </tr>
        </thead>
        <tbody>
            @foreach($soldProducts as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ number_format($item->category_price) }} VND</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection