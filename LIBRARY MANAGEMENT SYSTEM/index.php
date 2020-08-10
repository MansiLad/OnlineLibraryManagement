<!DOCTYPE html>
<html>
	<head>
		<title>
			Online Library Management System
		</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
		header{
			width: 1340px;
		}
		nav{
			float: right;
			word-spacing: 20px;
			padding: 20px;
		}
		nav li{
			display: inline-block;
			line-height: 80px;
		}
		body{
			background-image: url("images/FORALL.jpeg");
		}
		</style>
	</head>
	<body>
		<header>
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<nav>
				<ul>
					<li><a href="index.php">HOME</a></li>
					<li><a href="admin_login.php">ADMIN-LOGIN</a></li>
					<li><a href="student_login.php">STUDENT-LOGIN</a></li>
					<li><a href="student_register.php">SIGN-UP</a></li>
					<li><a href="feedback.php">FEEDBACK</a></li> 
				</ul>
			</nav>
		</header>
		<div class="sec_img">
			<br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcome to library</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">All Essentials Books </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Available here !!! </h1><br>
			</div>
		</div>
		<?php
			include "footer.php";
		?>
	</body>
</html>
