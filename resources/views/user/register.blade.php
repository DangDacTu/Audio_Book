<form action="/register" method="POST">
    @csrf
    <label>Họ tên:</label>
    <input type="text" name="name" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <label>Mật khẩu:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Đăng ký</button>
</form>