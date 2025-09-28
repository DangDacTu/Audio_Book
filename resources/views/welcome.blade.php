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
			/* màu đen xám */
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
			/* chừa chỗ sidebar */
			padding: 20px;
		}

		.logo {
			font-size: 20px;
			font-weight: bold;
			text-align: center;
			margin-bottom: 30px;
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
		<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #111827;">
			<div class="container-fluid">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" href="{{ URL::to('/cart') }}">
								<i class="fa-solid fa-cart-shopping"></i>
							</a>
						</li>
					</ul>
					<form class="d-flex" role="search" action="{{ route('product.search') }}" method="GET">
						<input class="form-control me-2" type="search" name="keyword" placeholder="Search"
							aria-label="Search" />
						<button class="btn btn-outline-light" type="submit">
							<i class="fa-solid fa-magnifying-glass"></i>
						</button>
					</form>
				</div>
			</div>
		</nav>


		@yield('content')
	</div>
	<script src="./toolbootstrap/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>