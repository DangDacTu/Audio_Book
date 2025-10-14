<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./toolbootstrap/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

	<title>Kho Bau Am Thanh</title>

	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #161d2c;
			color: #fff;
		}

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

		.main-content {
			margin-left: 220px;
			padding: 0;
		}

		.logo {
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			margin-bottom: 30px;
		}

		.main {
			flex: 1;
			display: flex;
			flex-direction: column;
		}

		.topbar {
			display: flex;
			justify-content: space-between;
			align-items: center;
			padding: 12px 20px;
			background: #1e293b;
		}

		.search-box input {
			padding: 8px 12px;
			border: none;
			border-radius: 6px;
			width: 260px;
		}

		.topbar-right {
			display: flex;
			align-items: center;
			gap: 20px;
		}

		.avatar {
			width: 36px;
			height: 36px;
			border-radius: 50%;
			background: #64748b;
		}
	</style>
</head>

<body>
	<div class="sidebar">
		<div class="logo">
			AudioBook
		</div>
		<a href="{{ URL::to('/home') }}"><i class="fas fa-home"></i> Trang chủ</a>
		<a href="/library"><i class="fas fa-book"></i> Thư viện</a>
		<a href="/ranking"><i class="fas fa-chart-line"></i> Bảng xếp hạng</a>
		<a href="/listening"><i class="fas fa-headphones"></i> Đang nghe</a>
		<hr style="border-color: #374151;">
		<a href="/audiobook"><i class="fas fa-book-open"></i> Sách nói</a>
		<a href="/story"><i class="fas fa-microphone"></i> Truyện nói</a>
		<a href="/podcast"><i class="fas fa-podcast"></i> Podcast</a>
		<a href="/kids"><i class="fas fa-child"></i> Thiếu nhi</a>
	</div>
	<div class="main-content">
		<div class="main">
			<!-- Top bar -->
			<div class="topbar">
				<div class="search-box">
					<form class="d-flex" role="search" action="{{ route('product.search') }}" method="GET"
						style="margin-bottom:0;">
						<input class="form-control me-2" type="search" name="keyword" placeholder="🔍 Tìm kiếm..."
							aria-label="Search" style="background:#fff; color:#222;" />
					</form>
				</div>
				<div class="topbar-right">
					<a href="{{ URL::to('/cart') }}" style="color:#fff; font-size:20px; text-decoration:none;">
						<i class="fa-solid fa-cart-shopping"></i>
					</a>
					<div class="avatar"></div>
				</div>
			</div>
			@yield('content')
		</div>
	</div>
	<script src="./toolbootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>