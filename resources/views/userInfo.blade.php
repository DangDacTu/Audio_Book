<!-- filepath: c:\xampp\htdocs\laravel-app\resources\views\userInfo.blade.php -->
@extends('adminLayout')

@section('adminContent')
    <section id="user-section">
        <h2 class="section-title">Danh sách tài khoản người dùng</h2>
        <table>
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection