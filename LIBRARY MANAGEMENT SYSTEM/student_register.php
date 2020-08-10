<?php
  $connect = mysqli_connect("localhost:3307", "root", "root", "library");
?>
<!doctype html>
<html>
  <head>
    <title> STUDENT REGISTRATION</title>
    <meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style type="text/css">
      body {
        background-image: url("images/Regbg.jpeg");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      h1{
        color: white;
      }
      label{
        color: white;
      }
      p{
        color: white
      }
      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
      }
      .logo img
      {
        float :left;
      	padding-left: 10px;
        padding-top: 0px;
      }
      header{
      	width: 1340px
      }
  </style>
  <body>
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
    <left>
      <div class="form-group w-50">
        <form action="" method="post" class="text-center p-5 m-5">
          <h1>Student Registration Form</h1>
          <label>Full Name :</label><input type="text" name="name" class="form-control" required></br>
          <label>Student ID :</label><input type="text" name="user" class="form-control" required></br>
          <label>Mobile Number :</label><input class="form-control" type="text" name="mobileno" required ><br/>
          <label>Email:</label><input type="email" name="email" class="form-control" required><br/>
          <label>Password:</label><input type="password" name="pass" class="form-control" required><br/>
          <input type="submit" value="Register" name="submit" class="form-control btn btn-info" ><br/><br/>
          <a href="student_login.php" class="form-control btn btn-danger">Login</a>
        </form>
      </div>
      <?php
        if(isset($_POST['submit']))
        {
        	if(!empty($_POST['user']) && !empty($_POST['pass']))
          {
            $name = $_POST['name'];
        		$user = $_POST['user']; /*student ID is user*/
            $num = $_POST['mobileno'];
            $email = $_POST['email'];
        		$pass = $_POST['pass'];
            $q = "SELECT * FROM student_reg WHERE StudentID='".$user."'";
        		$query = mysqli_query($connect,$q);
        		if(mysqli_num_rows($query) == 0)
        		{
        			$sql = "INSERT INTO `student_reg` (`StudentID`, `FullName`, `Mobile`, `Email`, `Password`, `Address`) VALUES('$user','$name','$num','$email','$pass','')";
        			$result = mysqli_query($connect, $sql);
        			if($result)
              {
        				echo "<script type='text/javascript'>alert('Account Created !!!');</script>";
                header("Location:student_login.php");
        			}
        			else
        			{
        				echo "Failure!";
        			}
        		}
        		else
        		{
        			echo "That Username already exists! Please try again.";
        		}
        	}
        	else
        	{
        		?>
        		<!--Javascript Alert -->
              <script>alert('Required all fields');</script>
            <?php
        	}
        }
      ?>
    </left>
    <footer>
      <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
    </footer>
  </body>
</html>
