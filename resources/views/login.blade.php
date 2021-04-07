<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Online Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Meta tag Keywords -->
	<!-- css files -->
	<link rel="stylesheet" href="{{asset('public/backend/css/style.css')}}" type="text/css" media="all" /> <!-- Style-CSS -->
	<link rel="stylesheet" href="{{asset('public/backend/css/font-awesome.css')}}"> <!-- Font-Awesome-Icons-CSS -->
	<!-- //css files -->
	<!-- online-fonts -->
	<link href="https://fonts.googleapis.com/css?family=Taviraj:300,400,500,600,700,800,900&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
	<!-- //online-fonts -->
</head>
<body>
	<!-- main -->
	<div class="center-container">
		<div class="main-content-agile">
			<div class="sub-main-w3">
				<div class="wthree-pro">
					<h2>Login</h2>
				</div>
				<?php
					$msg = Session::get('msg');
					if($msg) {
						echo "<b style='color:red'>".$msg."</b>";
						Session::put('msg',null);
					}
				?>
				<form  method="POST" action="{{URL::to('/login')}}">
					@csrf
					<div class="pom-agile">
						<input type="email" placeholder="E-mail" name="email" class="user" type="email" required="">
						<span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>
					<div class="pom-agile">
						<input  type="password" placeholder="Password" name="password" class="pass" type="password" required="">
						<span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					</div>
					<div class="sub-w3l">
						<h6><a href="{{URL::to('/show-register')}}">Register</a></h6>
						<div class="right-w3l">
							<input type="submit" value="Accept" name="login">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>