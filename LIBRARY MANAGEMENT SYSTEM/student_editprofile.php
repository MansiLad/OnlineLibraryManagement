<?php
	session_start();
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			EDIT PROFILE
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
			body {
				background-image: url('images/FORALL.jpeg');
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: cover;
				font-family: "Lato", sans-serif;
				transition: background-color .5s;
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
		    width:50%;
	      height: 35px;

		  }
		  .btn{
		    color: #ffffff
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
					<li><a href=""><div style="color: black">
						<?php
							echo "   Welcome-".$_SESSION['studentID']; ?> </div></a></li>
					<li><a href="student_welcome.php">HOME</a></li>
					<li><a href="student_feedback.php">FEEDBACK</a></li>
					<li><a href="logout.php">LOGOUT</a></li>
				</ul>
			</nav>
		</header>
		<div id="mySidenav" class="sidenav" >
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<a href="student_viewprofile.php">PROFILE</a>
			<a href="student_bookdetails.php">BOOKS</a>
			<a href="student_bookrequest.php">BOOKS REQUESTED</a>
			<a href="student_bookissue.php">ISSUE INFORMATION</a>
			<a href="student_finepay.php">FINES</a>
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
	  <div class="container" style="text-align: center;" >
	    <h2 style="font-family: Lucida Console; text-align: center; font-size:20px">Edit Profile</h2>
	    <h3 style="color: whte;"><?php echo "   Welcome-".$_SESSION['studentID']; ?> </h3>
	    <?php
	      $sql = "SELECT `FullName`, `Mobile`, `Email`, `Password`, `Address` FROM `student_reg` where `StudentID`='$_SESSION[studentID]'";
	      $q=mysqli_query($connect,$sql) or die (mysql_error());
	      while($row = mysqli_fetch_assoc($q))
	      {
	        $name = $row['FullName'];
	        $mobile = $row['Mobile'];
	        $email = $row['Email'];
	        $password = $row['Password'];
	        $address = $row['Address'];
	      }
	    ?>
	    <form class="" action="" method="post" enctype="multipart/form-data">
	      <label>Full Name: </label><input type="text" name="fullname" value="<?php echo $name;  ?>" class="form-control"  required=""><br>
	      <label>Email ID: </label><input type="text" name="email" value="<?php echo $email;  ?>" class="form-control"  required=""><br>
	      <label>Password: </label><input type="text" name="password" value="<?php echo $password;  ?>" class="form-control"  required=""><br>
	      <label>Mobile Number: </label><input type="text" name="mobile" value="<?php echo $mobile;  ?>" class="form-control"  required=""><br>
	      <label>Address: </label><input type="text" name="address" value="<?php echo $address;  ?>" class="form-control"  required=""><br>
	      <input type="submit" value="UPDATE" name="submit" class="form-control btn btn-info"><br/></br>
	    </form>
	  </div>
	  <?php
	    if(isset($_POST['submit']))
	    {
	      $name = $_POST['fullname'];
	      $email = $_POST['email'];
	      $mobile = $_POST['mobile'];
	      $password = $_POST['password'];
	      $address = $_POST['address'];
	      $sql1 = "UPDATE `student_reg` SET `FullName`='$name',`Mobile`='$mobile', `Email`='$email', `Password`='$password', `Address`='$address' WHERE `StudentID`='$_SESSION[studentID]' ";
	      if(mysqli_query($connect,$sql1))
	      {
	  ?>
	        <script type="text/javascript">
	          alert("Information Saved Successfully");
	        </script>
	  <?php
	        header("Location:student_viewprofile.php");
	      }
	      else
	      {
	  ?>
	        <script type="text/javascript">
	          alert("Unsuccessfully, Try again!");
	        </script>
	  <?php
	      }
	    }
	  ?>
	  <br><br>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
