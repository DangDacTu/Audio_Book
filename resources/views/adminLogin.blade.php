<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập Admin</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #0f172a;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
    }

    .login-container {
      background: #1e293b;
      color: #e2e8f0;
      padding: 40px 30px;
      border-radius: 16px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
      width: 100%;
      max-width: 400px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    h2 {
      color: #38bdf8;
      margin-bottom: 25px;
      font-size: 1.8em;
      font-weight: bold;
      letter-spacing: 1px;
    }

    form {
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .form-group {
      width: 100%;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #cbd5e1;
      font-weight: 600;
      font-size: 0.95em;
      text-align: left;
    }

    input {
      width: 100%;
      padding: 10px 14px;
      border: 1px solid #334155;
      border-radius: 8px;
      background: #0f172a;
      color: #f1f5f9;
      font-size: 0.95em;
      transition: all 0.3s ease;
      box-sizing: border-box;
    }

    input:focus {
      border-color: #38bdf8;
      box-shadow: 0 0 8px rgba(56, 189, 248, 0.3);
      outline: none;
    }

    button[type="submit"] {
      background: #38bdf8;
      color: #0f172a;
      padding: 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1em;
      font-weight: bold;
      width: 100%;
      transition: all 0.3s ease;
    }

    button[type="submit"]:hover {
      background: #0ea5e9;
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(14, 165, 233, 0.3);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-15px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Đăng nhập Admin</h2>
    <form action="{{ URL::to('/admin-dashboard') }}" method="POST">
      {{ csrf_field() }}

      <div class="form-group">
        <label for="username">Tên đăng nhập</label>
        <input type="text" id="username" name="admin_email" required>
      </div>

      <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="password" id="password" name="admin_password" required>
      </div>

      <button type="submit">Đăng nhập</button>
    </form>
  </div>
</body>
</html>
