<form action="/" method="POST">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Đăng nhập</button>
    <a href="/register">Đăng ký</a>
</form>