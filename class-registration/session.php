<?php
   include('login.php');
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($db,"select studentID from mjb34.STUDENTCREDS where studentID = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['myusername'];

   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
