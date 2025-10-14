<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập Admin</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 20px;
    }

    .login-container {
      background: #fff;
      padding: 40px 30px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 380px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    h2 {
      color: #2a5298;
      margin-bottom: 25px;
      font-size: 1.8em;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .form-group {
      margin-bottom: 20px;
      text-align: center;
      position: relative;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #444;
      font-weight: 600;
      font-size: 0.95em;
      text-align: left;
      max-width: 90%;
      margin-left: auto;
      margin-right: auto;
    }

    .form-group input {
      width: 80%; /* chiều rộng form */
      padding: 10px 38px 10px 12px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 0.95em;
      transition: all 0.3s ease;
    }

    .form-group input:focus {
      border-color: #2a5298;
      box-shadow: 0 0 6px rgba(42, 82, 152, 0.3);
      outline: none;
    }

    .form-group .icon {
      position: absolute;
      right: 28px;
      top: 44px;
      color: #999;
      font-size: 1.1em;
    }

    button[type="submit"] {
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 1em;
      font-weight: bold;
      width: 90%; /* nút cũng ngắn lại để đồng bộ với input */
      transition: all 0.3s ease;
    }

    button[type="submit"]:hover {
      background: linear-gradient(135deg, #2a5298, #1e3c72);
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
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
