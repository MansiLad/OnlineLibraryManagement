<!doctype html>
<html>
  <head>
    <title> STUDENT LOGIN</title>
    <meta charset="utf-8">
  	<link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
      body {
        background-image: url('images/LoginBG.jpeg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
      }
      header{
  	    width: 1340px
      }
      footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        color: white;
        text-align: center;
      }
      h1{
        color: black;
      }
      label{
        color: black;
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
          <h1> Student Login</h1>
          <label>Student ID:</label><input type="text" name="user"class="form-control"><br/>
          <label>Password:</label><input type="password" name="pass"class="form-control"><br/>
          <input type="submit" value="Login" name="submit"class="form-control btn btn-info"><br/></br>
          <p><a href="student_forgotpassword.php" class="form-control btn btn-success">Forgot Password ?</a></p>
          <!--New user Register Link -->
          <p><a href="student_register.php" class="form-control btn btn-success">New User Registeration!</a></p>
        </form>
        <?php
          if(isset($_POST["submit"]))
          {
            if(!empty($_POST['user']) && !empty($_POST['pass']))
            {
              $user = $_POST['user'];
              $pass = $_POST['pass'];
              //DB Connection
              $conn = new mysqli('localhost:3307', 'root', 'root') or die(mysqli_error());
              //Select DB From database
              $db = mysqli_select_db($conn, 'library') or die("database error");
              //Selecting database
              $query = mysqli_query($conn, "SELECT * FROM student_reg WHERE StudentID='".$user."' AND Password='".$pass."'");
              $numrows = mysqli_num_rows($query);
              if($numrows != 0)
              {
                while($row = mysqli_fetch_assoc($query))
                {
                  $dbusername=$row['StudentID'];
                  $dbpassword=$row['Password'];
                  $name=$row['FullName'];
                }
                if($user == $dbusername && $pass == $dbpassword)
                {
                  session_start();
                  $_SESSION['studentID']=$user;
                  //Redirect Browser
                  header("Location:student_welcome.php");
                }
              }
              else
              {
                ?>
                  <script>alert('Incorrect Credentials');</script>
                <?php
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
      </div>
    </center>
    <footer>
      <p style="color:white;  text-align: center; ">&copy; 2020 Online Library Management System | Designed With Love</p>
    </footer>
  </body>
</html>
