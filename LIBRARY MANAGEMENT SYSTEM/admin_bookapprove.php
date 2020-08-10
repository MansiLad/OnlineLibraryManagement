<?php
	session_start();
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			APPROVE BOOK
		</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<style type="text/css">
	  body {
	    background-image: url('images/FORALL.jpeg');
	    background-repeat: no-repeat;
	    background-attachment: fixed;
	    background-size: cover;
			font-family: "Lato", sans-serif;
			transition: background-color .5s;
	    color: white;
	  }
	  .table{
	    color: white;
	  }
		footer {
		  position: fixed;
		  left: 0;
		  bottom: 0;
		  width: 100%;
		  color: white;
		  text-align: center;
		}
	  .form-control{
	    width:300px;
	  }
	  .srch{
	    padding-left: 850px;
	  }
	  table, th, td {
	    border:1px solid black;
	  }
	  th {
	    padding: 25px;
	  }
	  td {
	    padding: 15px;
	  }
	  table {
	    border-spacing: 5px;
	  }
	  header{
	    width: 1361px
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
	<body text="#ffffff">
		<header>
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<nav>
				<ul>
					<li><a href=""><div style="color: black">
						<?php
							echo "   Welcome-".$_SESSION['admin_logged']; ?> </div></a></li>
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
		<div id="main">
			<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; open</span>
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
	    <h3>Approve Request</h3>
	    	<form class="Aprove" action="" method="post">
	        <label>Approve or Not: </label><input class="form-control" type="text" name="approve" value="" placeholder="Yes or No" required><br>
	        <label>Issue Date: </label><input class="form-control" type="text" name="issue" value="" required placeholder="DD-MM-YYYY"><br>
	        <label>Return Date: </label><input class="form-control" type="text" name="return" value="" placeholder="DD-MM-YYYY" required><br>
	        <button type="submit" name="submit" class="btn btn-info"> Submit</button>
	      </form>
	      <?php
	        if(isset($_POST['submit']))
	        {
	          mysqli_query($connect, "UPDATE issue_book SET approve='$_POST[approve]', issuedate='$_POST[issue]', returndate='$_POST[return]' WHERE StudentID='$_SESSION[stu_ID]' and bid='$_SESSION[book]' ;");
	          mysqli_query($connect, "UPDATE books SET Quantity = Quantity-1 WHERE bid='$_SESSION[book]';");
	          $res=mysqli_query($connect, "SELECT Quantity from books WHERE bid='$_SESSION[book]';");
	          while($row=mysqli_fetch_assoc($res))
	          {
	            if($row['Quantity']==0)
	            {
								$res="<p style='color:yellow; background-color:red; text-align:center'>Not Available</p>";
	              mysqli_query($connect,"UPDATE books SET status='$res' WHERE bid='$_SESSION[bid]';");
	            }
	          }
	      ?>
	          <script type="text/javascript">
	            alert("Updated Successfully.");
	          </script>
	      <?php
	            header("Location:admin_bookrequest.php");
	        }
	      ?>
	      <br><br><br><br><br>
	  </center>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
