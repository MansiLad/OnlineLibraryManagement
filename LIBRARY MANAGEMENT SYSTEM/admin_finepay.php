<?php
	session_start();
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			FINE PAYMENT
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
	  }
	  .srch{
	    padding-left: 800px;
	  }
	  table, th, td {
	    border:1px solid black;
			color: white;
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
	  footer {
	    position: fixed;
	    left: 0;
	    bottom: 0;
	    width: 100%;
	    color: white;
	    text-align: center;
	  }
	  header{
	    width: 1340px;
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
		.form-control{
			width:300px;
		}
		.srch{
			padding-left: 800px;
			color: white;
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
			<div class="srch">	<!--Search bar -->
	      <form class="navbar-form" method="post" name="form1">
	        <div>
            <input type="text" name="studentID" value="" class="form-control" placeholder="Student ID" required>
            <button type="submit" name="submit" class="btn btn-info">SEARCH</button>
	          <input type="text" name="bid" value="" class="form-control" placeholder="Book ID">
	          <button type="submit" name="submit1" class="btn btn-info">PAID</button></div>
        </form>
	    </div>
	    <br><br>
	    <font face = "Wildwest" color= white size = "5">List of Pending Fines</font><br /><br>
		  <?php
		    if(isset($_POST['submit']))
		    {
		      $q = mysqli_query($connect,"SELECT * FROM `returned_fine` where `StudentID`='$_POST[studentID]'");
		      if(mysqli_num_rows($q) == 0)
		      {
		        echo "<font face = 'Wildwest' color= white size = '4'> Sorry! No Fines Due for the Student. </font>";
		      }
		      else
		      {
            echo "<table class='table table-bordered table-hover' border='1' style='width:80%' align='center' class='center'>";
  			      echo "<tr align='center' style='background-color: #71899e73'>";
  				      echo "<th>";  echo"STUDENT ID"; echo "</th>";
  				      echo "<th>";  echo"BOOK ID"; echo "</th>";
  				      echo "<th>";  echo"RETURNED DATE"; echo "</th>";
  				      echo "<th>";  echo"DAYS DELAYED"; echo "</th>";
                echo "<th>";  echo"AMOUNT PAID"; echo "</th>";
                echo "<th>";  echo"STATUS"; echo "</th>";
  			    	echo "</tr>";
  			      while($row = mysqli_fetch_assoc($q))
  			      {
  			        echo "<tr align='center' style='background-color: #40488440'>";
  				        echo "<td>";  echo $row['StudentID'];  echo "</td>";
  				        echo "<td>";  echo $row['BookID'];  echo "</td>";
  				        echo "<td>";  echo $row['Returned_Day'];  echo "</td>";
  				        echo "<td>";  echo $row['Days_Delayed'];  echo "</td>";
                  echo "<td>";  echo $row['Amount_Paid'];  echo "</td>";
                  echo "<td>";  echo $row['Status'];  echo "</td>";
  			        echo "</tr>";
  			      }
  		      echo "</table>";
		      }
		    }
		    else /*if button not pressed*/
		    {
		      $query ="SELECT * FROM `returned_fine` WHERE `Status`='Not Paid'";
		      $result = mysqli_query($connect, $query);
		      echo "<table class='table table-bordered table-hover' border='1' style='width:80%' align='center' class='center'>";
			      echo "<tr align='center' style='background-color: #71899e73'>";
				      echo "<th>";  echo"STUDENT ID"; echo "</th>";
				      echo "<th>";  echo"BOOK ID"; echo "</th>";
				      echo "<th>";  echo"RETURNED DATE"; echo "</th>";
				      echo "<th>";  echo"DAYS DELAYED"; echo "</th>";
              echo "<th>";  echo"AMOUNT PAID"; echo "</th>";
              echo "<th>";  echo"STATUS"; echo "</th>";
			    	echo "</tr>";
			      while($row = mysqli_fetch_assoc($result))
			      {
			        echo "<tr align='center' style='background-color: #40488440'>";
				        echo "<td>";  echo $row['StudentID'];  echo "</td>";
				        echo "<td>";  echo $row['BookID'];  echo "</td>";
				        echo "<td>";  echo $row['Returned_Day'];  echo "</td>";
				        echo "<td>";  echo $row['Days_Delayed'];  echo "</td>";
                echo "<td>";  echo $row['Amount_Paid'];  echo "</td>";
                echo "<td>";  echo $row['Status'];  echo "</td>";
			        echo "</tr>";
			      }
		      echo "</table>";
		    }
        if(isset($_POST['submit1']))
        {
          $query ="UPDATE `returned_fine` SET `Status`='Paid' WHERE `StudentID`='$_POST[studentID]' AND `BookID`='$_POST[bid]'";
		      $result = mysqli_query($connect, $query);
      ?>
            <script type="text/javascript">
              alert("Payment Successfully !!!");
            </script>
      <?php
        }
        else
        {
      ?>
          <script type="text/javascript">
            alert("Unsuccessful");
          </script>
      <?php
        }
      ?>
			<br><br><br><br>
	  </center>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
