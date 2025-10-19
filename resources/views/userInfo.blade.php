<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\userInfo.blade.php -->
@extends('adminLayout')

@section('adminContent')
<section id="user-section" style="color:#fff; width:90%; margin:auto;">
    <h2 style="margin-bottom:20px;">👥 Danh sách tài khoản người dùng</h2>

    <div style="background:#1e293b; padding:25px; border-radius:12px; box-shadow:0 4px 15px rgba(0,0,0,0.3);">
        <table style="width:100%; border-collapse:collapse; color:#e2e8f0;">
            <thead>
                <tr style="background:#334155; color:#facc15; text-align:left;">
                    <th style="padding:12px 10px;">STT</th>
                    <th style="padding:12px 10px;">Tên tài khoản</th>
                    <th style="padding:12px 10px;">Email</th>
                    <th style="padding:12px 10px; text-align:center;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr style="border-bottom:1px solid #475569; transition:background 0.2s;">
                        <td style="padding:10px;">{{ $key + 1 }}</td>
                        <td style="padding:10px;">{{ $user->name }}</td>
                        <td style="padding:10px;">{{ $user->email }}</td>
                        <td style="padding:10px; text-align:center;">
                            <a href="{{ route('user.delete', $user->id) }}"
                               onclick="return confirm('Bạn có chắc muốn xóa tài khoản này?')"
                               style="color:#f87171; text-decoration:none; font-size:18px;">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
