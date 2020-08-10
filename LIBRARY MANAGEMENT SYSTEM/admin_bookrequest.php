<?php
	session_start();
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			BOOK REQUESTS
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
	    <div class="srch">
	  		<h5>Enter details to Approve</h5>
	      	<form class="" action="" method="post">
	          <input type="text" name="studentID" value="" class="form-control" placeholder="Student ID" required><br>
	          <input type="text" name="bid" value="" class="form-control" placeholder="Book ID"><br>
	          <button type="submit" name="submit" class="btn btn-info">Approve</button>
	        </form>
	    </div>
	    <font face = "Wildwest" color= white size = "5">List of Books Requested</font><br /><br>
	    <?php
	    	// we are merging 2 tables as we require the name of the book also
	      $sql = "SELECT i.StudentID, i.bid, b.Name, b.Author, b.Edition, b.Status FROM issue_book i, books b WHERE i.bid=b.bid and i.approve=''";
	      $q = mysqli_query($connect,$sql);
	      if(mysqli_num_rows($q) == 0)
	      {
	        echo "<h2>";
	        	echo " There is no pending Request. ";
	        echo "</h2";
	      }
	      else
	      {
	        echo "<table class='table table-bordered ' border='1' style='width:80%' align='center' class='center'>";
		        echo "<tr align='center' style='background-color: #71899e73'>";
			        echo "<th>";  echo"Student ID"; echo "</th>";
			        echo "<th>";  echo"Book ID"; echo "</th>";
			        echo "<th>";  echo"Book Name"; echo "</th>";
			        echo "<th>";  echo"Book Authors"; echo "</th>";
			        echo "<th>";  echo"Book Edition"; echo "</th>";
			        echo "<th>";  echo"Status"; echo "</th>";
		        echo "</tr>";
		        while($row = mysqli_fetch_assoc($q))
          	{
		          echo "<tr align='center' style='background-color: #40488440'>";
			          echo "<td>";  echo $row['StudentID'];  echo "</td>";
			          echo "<td>";  echo $row['bid'];  echo "</td>";
	            	echo "<td>";  echo $row['Name'];  echo "</td>";
			         	echo "<td>";  echo $row['Author'];  echo "</td>";
			          echo "<td>";  echo $row['Edition'];  echo "</td>";
			          echo "<td>";  echo $row['Status'];  echo "</td>";
		          echo "</tr>";
		        }
	        echo "</table>";
	      }
	      if(isset($_POST['submit']))
        {
          $_SESSION['stu_ID']=$_POST['studentID'];
          $_SESSION['book']=$_POST['bid'];
          header("Location:admin_bookapprove.php");
        }
	    ?>
	    <br><br><br><br><br>
	  </center>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
