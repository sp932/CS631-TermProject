<?php
include 'login.php';

$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(mysqli_connect_error()){
        die("Database Connection Failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
);
}

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM mjb34.STUDENTCREDS WHERE studentID = '$username' and password = '$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error());

$row = mysqli_fetch_array($result);
if ($row['studentID'] == $username && $row['password'] == $password ){
  echo "Login success! Welcome ".$row['studentID'];
} else {
  echo "Failed to login!";
}

?>



<!--
<php
include 'login.php';
        // connect to server and test if successful
        $db_server = mysql_connect($db_hostname, $db_username, $db_password);
        if (!$db_server) {
        die("Unable to connect to MySQL: " . mysql_error() . "<br /");
        } else {
        //echo "Connected to MySQL <br />";
        }
        // connect to specific database on server and test if successful
        if($_SERVER["REQUEST_METHOD"] == "POST") {
          // username and password sent from form

          $username = $_POST['username'];
          $password = $_POST['password'];

          $sql = "SELECT * FROM mjb34.STUDENTCREDS WHERE studentID = '$username' and password = '$password'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $active = $row['active'];

          $count = mysqli_num_rows($result);
?>
          // If result matched $myusername and $mypassword, table row must be 1 row

          if($count == 1) {
             session_register("username");
             $_SESSION['login_user'] = $username;

             header("location: welcome.php");
          }else {
             $error = "Your Login Name or Password is invalid";
          }
        }
        ?>
      -->
