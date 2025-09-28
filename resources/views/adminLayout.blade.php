<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Quản lý sản phẩm</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        aside {
            width: 220px;
            background: #f2f2f2;
            padding: 20px 10px;
            border-right: 1px solid #ccc;
        }

        .sidebar-title {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
        }

        .sidebar-menu li {
            margin-bottom: 15px;
        }

        .sidebar-menu a {
            text-decoration: none;
            color: #333;
        }

        .sidebar-menu a:hover {
            color: #007bff;
        }

        main {
            flex: 1;
            padding: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f2f2f2;
        }

        .section-title {
            margin-top: 30px;
        }

        section {
            margin-bottom: 40px;
        }
    </style>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>

<body>
    <aside>
        <div class="sidebar-title">Danh mục</div>
        <ul class="sidebar-menu">
            <li><a href="{{ route('product.list') }}">Sản phẩm trên gian hàng</a></li>
            <li><a href="{{ route('add.product') }}">Thêm sản phẩm</a></li>
            <li><a href="{{ route('user.info') }}">Thông tin người dùng</a></li>
        </ul>
    </aside>
    
    <main>
        <div style="text-align:right;">
            <form action="{{ url('/logout') }}" method="GET">
                @csrf
                <button type="submit">Đăng xuất</button>
            </form>
        </div>

        @yield('adminContent')


