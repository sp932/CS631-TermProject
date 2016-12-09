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
          <th align="center">Instructor ID</th>
          <th align="center">Seats Left</th>
          <th align="center"></th>
          <th align="center" ></th>
          <th align="center"></th>
        </tr>
      </thead>

      <tbody>
      <script type="text/javascript"> 
          
                function getRowData(id){
                    var rowData = document.getElementById(id).innerHTML;
                    
                    var dummyElement = document.createElement('tr');
                    
                    dummyElement.innerHTML = rowData;
                    
                    var cellData = dummyElement.getElementsByTagName('td');
                    
                    console.log(document.getElementById(id).innerHTML);
                    console.log(cellData);
                    console.log(cellData[0].innerHTML);
                    console.log(cellData[1].innerHTML);
                    console.log(cellData[2].innerHTML);
                    console.log(cellData[3].innerHTML);
                    
                    var c = cellData[0].innerHTML;
                    var se = cellData[1].innerHTML;
                    var i = cellData[2].innerHTML;
                    var fid = cellData[3].innerHTML;
                    var sl = cellData[4].innerHTML;
                    var sem = cellData[5].innerHTML;
                    var y = cellData[6].innerHTML;
                    var zz = sessionStorage.username;
                    
                    window.location.href = location.protocol + '//' + location.host + location.pathname
                            +'?c=' +c+'&se=' + se + '&i=' + i + '&fid='+ fid +'&sl='+sl+'&sem='+sem+'&y='+y+'&zz='+zz;
                }
                    
          </script>


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

          if(isset($username)){
              echo '<script type="text/javascript">'.
                  'sessionStorage.username = "'. $username .'";'.         
                  '</script>';
          }

          $query = "SELECT c.courseID as 'Course',c.sectionNumber as 'Section', f.name as 'Instructor', f.facultyID as 'facultyID', c.semester as 'Semester', c.semYear as 'Year', c.seatsLeft as 'Seats Left' FROM COURSESECTION c, FACULTY f where f.facultyID = c.facultyID order by c.courseID, c.sectionNumber ASC";          

          //$query = "SELECT cs.courseID as 'Course', cs.sectionNumber as 'Section', f.name as 'Instructor', f.facultyID as 'facultyID', cs.semester as 'Semester', cs.year as 'Year', cs.seatsLeft as 'Seats Left' FROM COURSESECTION cs, FACULTY f where f.facultyID = cs.facultyID order by cs.courseID, cs.sectionNumber ASC, cs.semester = 'Spring', cs.year = 2017";

          $result = mysqli_query($connection, $query) or die(mysqli_error());
    
          $rowIDNumber = 0;
          $total = 0;	
          while ($row = mysqli_fetch_array($result)) {
    
              // Print out the contents of the entry
  
              $rowIDString = (string)$rowIDNumber;
  
              echo '<tr id="' . $rowIDString . '">';
              echo '<td>' . $row['Course'] . '</td>';
              echo '<td>' . $row['Section'] . '</td>';
              echo '<td>' . $row['Instructor'] . '</td>';
              echo '<td>' . $row['facultyID'] . '</td>';
              echo '<td>' . $row['Seats Left'] . '</td>';
              echo '<td>' . $row['Semester'] . '</td>';
              echo '<td>' . $row['Year'] . '</td>';
              echo '<td><button type="button" class="btn btn-primary" onclick="getRowData(' . $rowIDString. ')">Register</button> </td>';
              echo '</tr>';
              $rowIDNumber = $rowIDNumber + 1;
          }

          mysqli_free_result($result);
          
          function register(){        
              $query = "INSERT INTO STUDENTREG (studentID, facultyID, courseID, sectionNumber, semester, semYear, status) VALUES ('" . $username . "', '" . $fid . "', '". $c ."', " .$se. ", '" . $sem ."', ". intval($y) .", 'Registered')";

              $result = mysqli_query($connection, $query) or die(mysqli_error());
              mysqli_free_result($result);
              
              $query = "UPDATE COURSESECTION "."SET seatsLeft = seatsLeft - 1 WHERE " . "facultyID = '" .$fid."' AND courseID = '".$c."' AND sectionNumber = ".intval($se) ." AND semester ='". $sem."' AND semYear = ".intval($y);
              $result = mysqli_query($connection, $query) or die(mysqli_error());   
              mysqli_free_result($result);
              
          }
 
          if (isset($_GET["c"]) && isset($_GET["se"]) && isset($_GET["i"]) && isset($_GET["fid"]) && isset($_GET["sl"])) {       
              echo $_GET["c"];
              echo $_GET["se"];
              echo $_GET["i"];
              echo $_GET["fid"];
              echo $_GET["sl"];
              $c = $_GET["c"];
              $se = $_GET["se"];
              $i = $_GET["i"];
              $fid =$_GET["fid"];
              $sem = $_GET["sem"]; 
              $y = $_GET["y"]; 
              $username = $_GET["zz"];  
              echo $username;
              
              register();
          }
          }

          ?>

              <br/>

    </tbody>

    </table>


  </div><!-- /container -->



</body>
</html>
