<?php
  session_start();
  if(isset($_SESSION['student_logged']))
  {
      unset($_SESSION['student_logged']);
  }
  if(isset($_SESSION['admin_logged']))
  {
    unset($_SESSION['admin_logged']);
  }
  header("Location: index.php");
?>
