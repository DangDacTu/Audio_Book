<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="style.css">
	<title>Kho Bau Am Thanh</title>
</head>
<body>
	<h1>Chao mung den voi kho bau am thanh</h1>
	<div>
		<ul>
			<li><a href ="{{ URL::to('/home') }}">Home</a></li>
			<li><a href ="/admin">Admin</a></li>
			<li><a href ="/pay">Thanh Toan</a></li>
		</ul>		
	</div>
	@yield('content')
	
</body>
</html>