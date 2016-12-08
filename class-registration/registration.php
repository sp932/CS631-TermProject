<!doctype html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

<title>Course Registration</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/dataTables.tableTools.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/dataTables.tableTools.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>

<script>
 $(document).ready( function () {
    $("#myTable").dataTable( {
        "dom": '<"clear">f',
        "paging": false,
        "searching": true,
    } );
} );
 </script>


</head>

<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="registration.php">Course Registration<span class="sr-only">(current)</span></a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>


    <div class="container">
    <h3><center><strong>Course Registration</strong></center></h3>
<table id="myTable" class="table filterable order-table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th align="center">Course</th>
          <th align="center">Section</th>
          <th align="center">Instructor</th>
          <th align="center">Seats Left</th>
          <th align="center"></th>
        </tr>
      </thead>

      <tbody>


      <?php
	include 'login.php';
	// connect to server and test if successful
	$connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(mysqli_connect_error()){
        die("Database Connection Failed: " .
                mysqli_connect_error() .
                " (" . mysqli_connect_errno() . ")"
);
}

$username = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT c.courseID as 'Course', c.sectionNumber as 'Section', f.name as 'Instructor', c.seatsLeft as 'Seats Left' FROM COURSESECTION c, FACULTY f where f.facultyID = c.facultyID order by c.courseID, c.sectionNumber ASC";

	$result = mysqli_query($connection, $query) or die(mysqli_error());


	$total = 0;
	while ($row = mysqli_fetch_array($result)) {
    // Print out the contents of the entry
    echo '<tr>';
    echo '<td>' . $row['Course'] . '</td>';
    echo '<td>' . $row['Section'] . '</td>';
    echo '<td>' . $row['Instructor'] . '</td>';
    echo '<td>' . $row['Seats Left'] . '</td>';
    echo '<td><button type="button" class="btn btn-primary">Register</button></td>';




}

mysqli_free_result($result);

?>
              <br/>

    </tbody>

    </table>


  </div><!-- /container -->



</body>
</html>
