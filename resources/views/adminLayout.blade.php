<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Quản lý sản phẩm</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<link rel="stylesheet" href="{{ asset('toolbootstrap/bootstrap/css/bootstrap.min.css') }}">

	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #161d2c;
			color: #fff;
			display: flex;
			min-height: 100vh;
		}

		/* Sidebar style giống Home */
		.sidebar {
			position: fixed;
			top: 0;
			left: 0;
			height: 100vh;
			width: 220px;
			background-color: #111827;
			color: #fff;
			padding-top: 20px;
		}

		.sidebar a {
			display: flex;
			align-items: center;
			padding: 12px 20px;
			color: #d1d5db;
			text-decoration: none;
			transition: background 0.2s;
		}

		.sidebar a:hover {
			background-color: #1f2937;
			color: #fff;
		}

		.sidebar a i {
			margin-right: 12px;
		}

		.logo {
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			margin-bottom: 30px;
		}

		.main-content {
			margin-left: 220px;
			flex: 1;
			display: flex;
			flex-direction: column;
			background-color: #161d2c;
			min-height: 100vh;
		}

		/* Top bar */
		.topbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 12px 20px;
			background: #1e293b;
		}

		/* User icon */
		.user-icon {
			font-size: 28px;
			color: #e2e8f0;
			cursor: pointer;
			transition: color 0.3s, transform 0.2s;
			border: none;
			background: none;
		}

		.user-icon:hover {
			color: #facc15;
			transform: scale(1.1);
		}

		.dropdown-menu {
			background-color: #1e293b;
			border: none;
			min-width: 160px;
		}

		.dropdown-item {
			color: #e2e8f0;
			padding: 10px 16px;
			transition: background 0.2s, color 0.2s;
		}

		.dropdown-item:hover {
			background-color: #374151;
			color: #facc15;
		}

		.dropdown-divider {
			border-color: #374151;
		}

		main {
			padding: 30px;
			color: #fff;
		}

		table {
			border-collapse: collapse;
			width: 100%;
			margin-top: 20px;
			background-color: #1e293b;
			color: #e2e8f0;
			border-radius: 8px;
			overflow: hidden;
		}

		th,
		td {
			padding: 10px 12px;
			text-align: left;
			border-bottom: 1px solid #374151;
		}

		th {
			background-color: #0f172a;
			color: #facc15;
		}

		tr:hover {
			background-color: #2d3748;
		}

		button {
			background-color: #facc15;
			color: #111;
			border: none;
			padding: 6px 12px;
			border-radius: 4px;
			cursor: pointer;
			font-weight: bold;
			transition: background 0.2s;
		}

	</style>
</head>

<body>
	<aside class="sidebar">
		<div class="logo">
			Administration 📊
		</div>
		<a href="{{ route('product.list') }}"><i class="fas fa-boxes"></i> Sản phẩm</a>
		<a href="{{ route('add.product') }}"><i class="fas fa-plus-circle"></i> Thêm sản phẩm</a>
		<a href="{{ route('user.info') }}"><i class="fas fa-user"></i> Người dùng</a>
		<a href="{{ route('admin.revenue') }}"><i class="fas fa-coins"></i> Doanh thu</a>
		<hr style="border-color:#374151;">
		<a href="{{ URL::to('/home') }}"><i class="fas fa-arrow-left"></i> Quay về trang chủ</a>
	</aside>

	<div class="main-content">
		<!-- Top bar -->
		<div class="topbar">
			<h4 style="margin:0; color:#facc15;">Dash Board</h4>
			<div class="dropdown">
				<button class="user-icon dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
					aria-expanded="false">
					<i class="fas fa-user-circle"></i>
				</button>
				<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
					<li><a class="dropdown-item" href="{{ URL::to('/home') }}">🏠 Trang người dùng</a></li>
					<li><hr class="dropdown-divider"></li>
					<li>
						<form action="{{ url('/logout') }}" method="GET" style="margin:0;">
							@csrf
							<button type="submit" class="dropdown-item" style="background:none; border:none; color:#e2e8f0;">🚪 Đăng xuất</button>
						</form>
					</li>
				</ul>
			</div>
		</div>

		<main>
			@yield('adminContent')
		</main>
	</div>

	<script src="{{ asset('toolbootstrap/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
