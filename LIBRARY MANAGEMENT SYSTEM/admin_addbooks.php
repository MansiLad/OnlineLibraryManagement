<?php
	session_start();
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			ADD BOOKS
		</title>
	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
		<style type="text/css">
	  	body {
	    	background-image: url('images/FORALL.jpeg');
	    	background-repeat: no-repeat;
	    	background-attachment: fixed;
	    	background-size: cover;
				font-family: "Lato", sans-serif;
				transition: background-color .5s;
	  	}
			footer {
		  	position: fixed;
		  	left: 0;
			  bottom: 0;
			  width: 100%;
			  color: white;
			  text-align: center;
			}
		  .srch{
		    padding-left: 800px;
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
		  .container{
		    width: 600px;
		    height: 500px;
		    margin: 60px auto;
		    background-color: #71899e73;
		    color:white;
		    padding: 15px;
		  }
		  .book{
		    width: 50%;
		    margin: 0px auto;
		  }
		  label {
		    font-weight: bold;
		    width: 200px;
		    float: left;
		  }
		  .form-control{
		    width:50%

		  }
		  .btn{
		    color: #ffffff
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
					<li><div style="color: black">
						<?php echo "   Welcome-".$_SESSION['admin_logged']; ?> </div></li>
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
		<div id="main">
			<span style="font-size:20px;cursor:pointer ;color:white" onclick="openNav()">&#9776; open</span>
	    <div class="container" style="text-align: center;" >
		    <h2 style="font-family: Lucida Console; text-align: center; font-size:20px">ADD NEW BOOKS</h2><br>
		    <form method="post">
		      <label>Book Name: </label><input type="text" name="bookname" value="" class="form-control"  required=""><br>
		      <label>Author Name: </label><input type="text" name="author" value="" class="form-control" required=""><br>
		      <label>Edition: </label><input type="text" name="edition" value="" class="form-control"  required=""><br>
		     	<label>Status: </label><input type="text" name="status" value="" class="form-control" placeholder=" Available or Not Available"  required=""><br>
		      <label>Quantity: </label><input type="text" name="quantity" value="" class="form-control"  required=""><br>
		      <label>Department: </label><input type="text" name="department" value="" class="form-control" required=""><br>
		      <input type="submit" value="ADD" name="submit" class="form-control btn btn-info"><br/></br>
		    </form>
		    <?php
		    	if(isset($_POST['submit']))
		      {
		        mysqli_query($connect,"INSERT INTO `books` (`bid`, `Name`, `Author`, `Edition`, `Status`, `Quantity`, `Department`) VALUES (NULL,'$_POST[bookname]','$_POST[author]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]')");
				?>
		        <script type="text/javascript">
		          alert("Book Added Successfully !!!");
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
  		</div>
		</div>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
