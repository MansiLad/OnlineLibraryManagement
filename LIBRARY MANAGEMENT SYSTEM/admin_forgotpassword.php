<?php
	session_start();
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			CHANGE PASSWORD
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
	    }
	    .container{
	      width: 400px;
	      height: 400px;
	      margin: 80px auto;
	      background-color: #71899e73;
	      color:white;
	      padding: 15px;
	    }
	    .form-control{
	      width:200px
	    }
	  </style>
	</head>
	<body style="text=#FFFFFF">
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
			</header>
	    <br><br><br><br>
	  </div>
	  <center>
	  	<div class="container">
	      <div style="text-align: center;">
	        <h1 style="font-size: 35px; font-family: Lucida Console;">CHANGE PASSWORD</h1>
	      </div>
	      <form  action="" method="post">
	        <label>Admin ID</label> <input type="text" name="AdminID" value="" class="form-control" required=""><br>
	        <label>Email</label><input type="text" name="Email" class="form-control" required=""><br>
	        <label>New Password</label><input type="password" name="password" class="form-control" required=""><br>
	        <button class="btn btn-default" style=" background-color: white;" type="submit" name="submit">Update</button>
	      </form>
	      <?php
	        if(isset($_POST['submit']))
	        {
	          $sql=mysqli_query($connect, "UPDATE `admin_login` SET `Password` = '$_POST[password]' WHERE `admin_login`.`AdminID` = '$_POST[AdminID]' ;");
	          if($sql){
	    				echo "<script type='text/javascript'>alert('Password Changed!!');</script>";
	            header("Location: admin_login.php");
	    			}
	    			else
	    			{
	    				echo "Failure!";
	    			}
	        }
	      ?>
	    </div>
	  </center>
	  <footer>
	    <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
	  </footer>
	</body>
</html>
