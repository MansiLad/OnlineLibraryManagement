<?php
	session_start();
	$connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
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
	      transition: background-color .5s;
	      text="#ffffff"
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
	    h3{
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
	<body text="#ffffff">
	  <header>
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<nav>
	      <ul>
					<li><a href=""><div style="color: black">
						<?php
						echo "   Welcome-".$_SESSION['studentID']; ?> </div></a></li>
					<li><a href="student_welcome.php">HOME</a></li>
					<li><a href="student_feedback.php">FEEDBACK</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>
	  </header><br><br>
		<div id="mySidenav" class="sidenav" >
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="student_viewprofile.php">PROFILE</a>
			<a href="student_bookdetails.php">BOOKS</a>
			<a href="student_bookrequest.php">BOOKS REQUESTED</a>
			<a href="student_bookissue.php">ISSUE INFORMATION</a>
			<a href="student_finepay.php">FINES</a>
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
	  <center>
			<h3>If you have any suggesions or questions please comment below.</h3><br>
			<form style="" action="" method="post">
				<input class="form-control" type="text" name="comment" placeholder="Write something..."><br><br>
				<input class="btn btn-default" type="submit" name="submit" value="Comment" style="width: 100px; height: 35px;">
			</form>
	    <br><br>
		  <div class="scroll">
				<?php
					if(isset($_POST['submit']))
					{
						$sql="INSERT INTO `comments`(Comment) VALUES('$_POST[comment]');";
						if(mysqli_query($connect,$sql))
						{
							$q="SELECT * FROM `comments` ORDER BY `comments`.`ID` DESC";
							$res=mysqli_query($connect,$q);
							echo "<table class='table table-bordered' border='1' style='width:80%' align='center' class='center'>";
								echo "<tr align='center' style='background-color: #71899e73'>";
			          	echo "<th>";  echo"COMMENTS"; echo "</th>";
								echo "</tr>";
								while ($row=mysqli_fetch_assoc($res))
								{
									echo "<tr align='center' style='background-color: #40488440'>";
										echo "<td>"; echo $row['Comment']; echo "</td>";
									echo "</tr>";
								}
							echo "</table>";
						}
					}
					else
					{
						$q = "SELECT * FROM `comments` ORDER BY `comments`.`ID` DESC";
						$res = mysqli_query($connect, $q);
						echo "<table class='table table-bordered' align='center' class='center'>";
							echo "<tr align='center' style='background-color: #71899e73'>";
								echo "<th>";  echo"COMMENTS"; echo "</th>";
							echo "</tr>";
							while($row = mysqli_fetch_assoc($res))
							{
								echo "<tr align='center' style='background-color: #40488440'>";
									echo "<td>"; echo $row['Comment']; echo "</td>";
								echo "</tr>";
							}
						echo "</table>";
					}
				?>
			</div>
		</center>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
