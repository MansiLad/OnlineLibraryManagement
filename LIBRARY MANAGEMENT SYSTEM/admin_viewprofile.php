<?php
	session_start();
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			ADMIN PROFILE
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
	      width: 1361px
	    }
			table, th, td {
				border:1px solid black;
			}
	    table.center {
	      margin-left: auto;
	      margin-right: auto;
	      border: 1px solid black;
	      padding: 10px;
	    }
	    th {
	      padding: 25px;
	    }
	    td {
	      padding: 15px;
	    }
	    footer {
	      position: fixed;
	      left: 0;
	      bottom: 0;
	      width: 100%;
	      color: white;
	      text-align: center;
	    }
	    body {
	      background-image: url('images/FORALL.jpeg');
	      background-repeat: no-repeat;
	      background-attachment: fixed;
	      background-size: cover;
				color: white;
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
	  </style>
	</head>
	<body style="text=#FFFFFF">
	  <header>
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<nav>
				<ul>
					<li><div style="color: black">
						<?php
						echo "   Welcome-".$_SESSION['admin_logged']; ?> </div></li>
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
		<div class="container">
	    <form action="" method="post">
	      <button class="btn btn-success btn-lg float-right" style="float:right width:70px; background-color:#71899e73" type="submit" name="edit">EDIT</button>
	    </form>
	    <br><br>
	    <center style="text-align: center; color:#FFFFFF";>
	      <h2>My Profile</h2>
	    	<?php
					if(isset($_POST['edit']))
					{
					  header("Location:admin_editprofile.php");
					}
		      $q = mysqli_query($connect, "SELECT * FROM admin_login where AdminID='$_SESSION[admin_logged]';");
		      $row = mysqli_fetch_assoc($q);
		      echo "<div style='text-align: center'>
		        			<img src='images/AdminPic.png' style='width:100px;height:100px;'>
		        		</div>";
		      echo "<h3>Welcome</h3>";
		      echo $_SESSION['admin_logged'];
		      echo "</br>";
		      echo "<table class='center' class='table table-bordered' style='text-align:center;background-color: #3144b39c; color:white; width:500px'>";
			      echo "<tr>";
			        echo "<td>";  echo "<b>Full Name: </b>";  echo"</td>";
			        echo "<td>";  echo $row['AdminName'];  echo"</td>";
			      echo"</tr>";
			      echo "<tr>";
			        echo "<td>";  echo "<b>Email ID: </b>";  echo"</td>";
			        echo "<td>";  echo $row['Email'];  echo"</td>";
			      echo"</tr>";
			      echo "<tr>";
			        echo "<td>";  echo "<b>Mobile Number:</b>";  echo"</td>";
			        echo "<td>";  echo $row['Mobile'];  echo"</td>";
			      echo"</tr>";
						echo "<tr>";
							echo "<td>";  echo "<b>Address:</b>";  echo"</td>";
							echo "<td>";  echo $row['Address'];  echo"</td>";
						echo"</tr>";
		      echo "</table>";
		    ?>
				<br><br><br>
	    </center>
	  </div>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
