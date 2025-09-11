<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập tài khoản</title>
</head>
<body>
    <h2>Đăng nhập tài khoản Admin</h2>
    <form action="{{URL::to ('/admin-dashboard') }}" method="POST">
        {{ csrf_field() }}
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="admin_email" required><br><br>

        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="admin_password" required><br><br>

        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>