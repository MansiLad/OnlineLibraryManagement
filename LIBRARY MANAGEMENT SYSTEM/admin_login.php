<!doctype html>
<html>
  <head>
    <title> ADMIN LOGIN</title>
    <meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style type="text/css">
      body {
        background-image: url('images/LoginBG.jpeg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      h1{
        color: black;
      }
      label{
        color: black;
      }
      header{
  	    width: 1340px;
      }
      p{
        color: white
      }
      .logo img
      {
        float :left;
  	    padding-left: 10px;
        padding-top: 0px;
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
          <h1> Admin Login</h1>
          <label>Admin ID:</label><input type="text" name="user"class="form-control"><br/>
          <label>Password:</label><input type="password" name="pass" class="form-control"><br/>
          <input type="submit" value="Login" name="submit"class="form-control btn btn-info"><br/></br>
          <p><a href="admin_forgotpassword.php" class="form-control btn btn-success">Forgot Password ?</a></p>
          <!--New user Register Link -->
        </form>
      </div>
      <?php
        if(isset($_POST["submit"])){
  	      if(!empty($_POST['user']) && !empty($_POST['pass']))
          {
            $user = $_POST['user'];
  		      $pass = $_POST['pass'];
  		      $conn = new mysqli('localhost:3307', 'root', 'root') or die(mysqli_error());  //DB Connection
  		      $db = mysqli_select_db($conn, 'library') or die("database error");  //Select DB From database
  		      $query = mysqli_query($conn, "SELECT * FROM admin_login WHERE AdminID='".$user."' AND Password='".$pass."'"); //Selecting database
            $numrows = mysqli_num_rows($query);
  		      if($numrows !=0)
            {
              while($row = mysqli_fetch_assoc($query))
              {
                $dbusername = $row['AdminID'];
                $dbpassword = $row['Password'];
              }
              if($user == $dbusername && $pass == $dbpassword)
              {
                session_start();
                $_SESSION['admin_logged']=$user;
                $_SESSION['admin_pic'] = $row['imgname'];
                //Redirect Browser
                header("Location:admin_welcome.php");
              }
            }
            else
            {
              echo "Invalid Username or Password!";
              header("Location:admin_login.php");
            }
          }
          else
          {
      ?>
              <script>alert('Required All fields!');</script>
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
