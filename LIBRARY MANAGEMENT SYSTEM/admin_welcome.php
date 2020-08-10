<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		ADMIN HOMEPAGE
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<style type="text/css">
		header{
			width: 1340px
		}
		body {
			background-image: url('images/FORALL.jpeg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
			font-family: "Lato", sans-serif;
			transition: background-color .5s;
			text="#ffffff"
		}
		footer {
  		position: fixed;
  		left: 0;
  		bottom: 0;
  		width: 100%;
  		color: white;
  		text-align: center;
		}
		.sidenav {
		  height: 100%;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #5f4cd2a1;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
			margin-top: 110px;
		}
		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 15px;
		  color: #FFFFFF;
		  display: block;
		  transition: 0.3s;
		}
		.sidenav a:hover {
			color: #f1f1f1;
			background-color: #131315a1;
		}
		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}
		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}
		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		header{
			width: 1361px
		}
	</style>
</head>
<body>
	<div class="wrapper">
		<header>
		<div class="logo">
			<img src="images/logo.png">
		</div>
		<nav>
			<ul>
				<li><a href="admin_welcome.php">HOME</a></li>
				<li><a href="admin_feedback.php">FEEDBACK</a></li>
				<li><a href="logout.php">LOGOUT</a></li>
			</ul>
		</nav>
		</header>
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="admin_viewprofile.php">PROFILE</a>
			<a href="admin_viewstudent.php">STUDENT INFORMATION</a>
			<a href="admin_bookdetails.php">BOOKS AVAILABLE</a>
			<a href="admin_addbooks.php">ADD BOOKS</a>
			<a href="admin_bookrequest.php">BOOK REQUEST</a>
			<a href="admin_bookissue.php">ISSUE INFORMATION</a>
			<a href="admin_bookexpire.php">EXPIRED LIST</a>
			<a href="admin_finepay.php">FINE PAYMENT</a>
		</div>
		<div id="main" style="text: white;">
			<span style="font-size:20px;cursor:pointer;color:white" onclick="openNav()">&#9776; open</span>
			<script>
				function openNav() {
					document.getElementById("mySidenav").style.width = "250px";
					document.getElementById("main").style.marginLeft = "250px";
					document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
				}
				function closeNav() {
					document.getElementById("mySidenav").style.width = "0";
					document.getElementById("main").style.marginLeft= "0";
					document.body.style.backgroundColor = "white";
				}
			</script>
		</div>
		<div class="box">
			<br><br><br>
			<h1 style="text-align: center; font-size: 35px;">Welcome to library</h1><br><br>
			<h2 style="text-align: center;">
			<?php
				echo "   Welcome-".$_SESSION['admin_logged'];
			?>
			</h2>
		</div>
	</div>
  <footer>
    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
  </footer>
</body>
</html>
