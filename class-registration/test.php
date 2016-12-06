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

<title>Call Summary Search</title>
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
        "dom": 'T<"clear">f',
        "paging": false,
        "tableTools": {
            "sSwfPath": "swf/copy_csv_xls_pdf.swf"
        }
    } );
} );
 </script>






</head>

<body>



    <div class="container">
    <h3><center><strong>Test</strong></center></h3>
<table id="myTable" class="table filterable order-table table-hover table-bordered table-striped">
      <thead>
        <tr>
          <th align="center">studentID</th>
          <th align="center">password</th>
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


$query = "SELECT * FROM mjb34.STUDENTCREDS WHERE studentID = '$username' and password = '$password'";

	$result = mysqli_query($connection, $query) or die(mysqli_error());


	$total = 0;
	while ($row = mysqli_fetch_array($result)) {
    // Print out the contents of the entry
    echo '<tr>';
    echo '<td>' . $row['studentID'] . '</td>';
    echo '<td>' . $row['password'] . '</td>';
}

mysqli_free_result($result);

?>
          <p><center>Below is a call summary report from <b><?php echo $start ?></b> to <b><?php echo $end ?></b>. <a href="call_sum_search.php">Click here to change the date range.</a></center></p>
              <br/>

    </tbody>

    </table>


  </div><!-- /container -->



</body>
</html>
