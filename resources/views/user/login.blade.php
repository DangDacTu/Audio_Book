<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập hệ thống</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0f172a, #1e293b);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #e2e8f0;
      margin: 0;
    }

    .auth-form {
      background: #1e293b;
      width: 100%;
      max-width: 380px;
      padding: 35px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      text-align: center;
      animation: fadeIn 0.5s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(25px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .auth-form h2 {
      margin-bottom: 25px;
      font-size: 1.8em;
      font-weight: 600;
      color: #38bdf8;
      border-bottom: 2px solid #38bdf8;
      padding-bottom: 5px;
    }

    .auth-form label {
      display: block;
      text-align: left;
      margin-bottom: 6px;
      font-weight: 500;
      color: #cbd5e1;
      font-size: 14px;
    }

    .auth-form input {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 18px;
      border: 1px solid #475569;
      border-radius: 8px;
      background: #0f172a;
      color: #f8fafc;
      font-size: 14px;
      box-sizing: border-box;
      transition: border-color 0.2s, box-shadow 0.2s;
    }

    .auth-form input:focus {
      border-color: #38bdf8;
      box-shadow: 0 0 5px rgba(56, 189, 248, 0.3);
      outline: none;
    }

    .auth-form button {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #38bdf8, #0ea5e9);
      color: white;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      font-size: 15px;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }

    .auth-form button:hover {
      background: #0ea5e9;
      transform: translateY(-2px);
    }

    .auth-form .register-link {
      display: block;
      margin-top: 14px;
      color: #38bdf8;
      font-size: 14px;
      text-decoration: none;
      transition: color 0.2s;
    }

    .auth-form .register-link:hover {
      color: #0ea5e9;
      text-decoration: underline;
    }

    .checkbox {
      display: flex;
      align-items: center;
      gap: 6px;
      font-size: 14px;
      color: #94a3b8;
      margin-bottom: 20px;
    }

    .checkbox input {
      width: 16px;
      height: 16px;
    }
  </style>
</head>

<body>
  <form action="/" method="POST" class="auth-form">
    @csrf
    <h2>Đăng nhập</h2>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required value="{{ request()->cookie('user_email') ?? '' }}">

    <label for="password">Mật khẩu:</label>
    <input type="password" id="password" name="password" required>

    <div class="checkbox">
      <input type="checkbox" name="remember" id="remember">
      <label for="remember">Ghi nhớ tôi</label>
    </div>

    <button type="submit">Đăng nhập</button>
    <a href="/register" class="register-link">Đăng ký tài khoản mới</a>
  </form>
</body>
</html>
