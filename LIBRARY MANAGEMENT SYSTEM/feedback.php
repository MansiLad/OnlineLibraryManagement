<?php $connect = mysqli_connect("localhost:3307", "root", "root", "library"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
	  body
    {
  		background-image: url("images/FORALL.jpeg");
  	}
		table.center {
		  margin-left: auto;
		  margin-right: auto;
		  border: 1px solid black;
		  padding: 10px;
			border-color: white;
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
    nav
    {
      float: right;
      word-spacing: 30px;
      padding: 20px;
    }
    nav li
    {
      display: inline-block;
      line-height: 80px;
    }
    .form-control
    {
    	height: 70px;
    	width: 60%;
    }
    .scroll
    {
    	width: 100%;
    	height: 300px;
    	overflow: auto;
    }
    h1{
      color: white;
			font-size: 30px;
    }
  </style>
</head>
<body text="#ffffff">
	<div class="wrapper">
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
  </header><br><br>
  <center>
		<h1>FEEDBACK from our users</h1>
    <br><br>
	   <div class="scroll">
		 <?php

				$q = "SELECT * FROM `comments` ORDER BY `comments`.`ID` DESC";
				$res = mysqli_query($connect, $q);
				echo "<table class='table table-bordered' align='center' class='center'>";
				echo "<tr align='center' style='background-color: #71899e73'>";
					echo "<th>";  echo"Feedbacks"; echo "</th>";
				echo "</tr>";
				while($row = mysqli_fetch_assoc($res))
				{
					echo "<tr align='center' style='background-color: #40488440'>";
						echo "<td>"; echo $row['Comment']; echo "</td>";
					echo "</tr>";
				}
				echo "</table>";

		?>
			</div>
	</div>
</center>
  <footer>
    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
  </footer>
</body>
</html>
