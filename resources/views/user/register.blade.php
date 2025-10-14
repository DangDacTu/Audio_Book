<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .auth-form {
            width: 100%;
            max-width: 380px;
            padding: 35px 28px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .auth-form h2 {
            margin-bottom: 25px;
            font-size: 1.7em;
            color: #333;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        .auth-form label {
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-weight: 600;
            color: #444;
            font-size: 14px;
        }

        .auth-form input {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .auth-form input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
        }

        .auth-form button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #2a5298, #1e3c72);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .auth-form button:hover {
            background: #0056b3;
        }

        .auth-form .login-link {
            display: block;
            margin-top: 14px;
            color: #007bff;
            font-size: 14px;
            text-decoration: none;
        }

        .auth-form .login-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        h2 {
            color: #2a5298;
            margin-bottom: 25px;
            font-size: 1.8em;
            font-weight: bold;
            letter-spacing: 1px;
        }
       
    
    </style>
</head>

<body>
    <form action="/register" method="POST" class="auth-form">
        @csrf
        <h2>Đăng ký</h2>
        <label for="name">Họ tên:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Đăng ký</button>
        <a href="/login" class="login-link">Đăng nhập tài khoản</a>
    </form>
</body>

</html>