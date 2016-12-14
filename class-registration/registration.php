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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
                    
                    // Get the inner HTML for for a particular row
                    var rowData = document.getElementById(id).innerHTML;
                    
                    // Create a dummy tr element and add the row data in it
                    var dummyElement = document.createElement('tr');
                    dummyElement.innerHTML = rowData;
                    
                    // Create array of data of each gell
                    var cellData = dummyElement.getElementsByTagName('td');
                    
                    // Set the variables
                    var c = cellData[0].innerHTML;
                    var se = cellData[1].innerHTML;
                    var i = cellData[2].innerHTML;
                    var fid = cellData[3].innerHTML;
                    var sl = cellData[4].innerHTML;
                    var sem = cellData[5].innerHTML;
                    var y = cellData[6].innerHTML;
                    var zz = sessionStorage.username;
                    
                    // Update url with GET variables so php can pick up via $_GET superglobal variable
                    window.location.href = location.protocol + '//' + location.host + location.pathname
                            +'?c=' +c+'&se=' + se + '&i=' + i + '&fid='+ fid +'&sl='+sl+'&sem='+sem+'&y='+y+'&zz='+zz;
                }
                    
          </script>


      <?php
          include 'login.php';
          // Connect to server and test if successful
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
          
          //This query will get all of course that you can register for the current semester. You will have to set the 
          //semester manually for when each semester comes aroud

          $query = "SELECT c.courseID as 'Course', c.sectionNumber as 'Section', f.name as 'Instructor', f.facultyID as 'facultyID', c.semester as 'Semester', c.semYear as 'Year', c.seatsLeft as 'Seats Left' FROM COURSESECTION c, FACULTY f where f.facultyID = c.facultyID AND c.semester = 'Spring' AND c.semYear = 2017 ORDER BY c.courseID";

          //$query = "SELECT cs.courseID as 'Course', cs.sectionNumber as 'Section', f.name as 'Instructor', f.facultyID as 'facultyID', cs.semester as 'Semester', cs.year as 'Year', cs.seatsLeft as 'Seats Left' FROM COURSESECTION cs, FACULTY f where f.facultyID = cs.facultyID order by cs.courseID, cs.sectionNumber ASC, cs.semester = 'Spring', cs.year = 2017";

          $result = mysqli_query($connection, $query) or die(mysqli_error());
            
          //Variable for generating id's for each table cell
          $rowIDNumber = 0;
          $total = 0;	
          while ($row = mysqli_fetch_array($result)) {
    
              // Print out the contents of the entry
              // onlick getRowData will go to the javascript that is earlier in this php file, and will get the data for that row
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
          
          // Function to register for course
          function register($c, $se, $i, $fid, $sem, $y, $username){  
              include 'login.php';
              $connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

              $query = "INSERT INTO STUDENTREG (studentID, facultyID, courseID, sectionNumber, semester, semYear, status) VALUES ('" . $username . "', '" . $fid . "', '". $c ."', " .$se. ", '" . $sem ."', ". intval($y) .", 'Registered')";
                            
              $result = mysqli_query($connection, $query) or die(mysqli_error());
              mysqli_free_result($result);
            
              
              $query = "UPDATE COURSESECTION "."SET seatsLeft = seatsLeft - 1 WHERE " . "facultyID = '" .$fid."' AND courseID = '".$c."' AND sectionNumber = ".intval($se) ." AND semester ='". $sem."' AND semYear = ".intval($y);
              $result = mysqli_query($connection, $query) or die(mysqli_error());   
              mysqli_free_result($result);
              
          }
          
          // Function to see if there are any seats left and return a boolean
          function anySeatsLeft($c, $se, $i, $fid, $sem, $y, $username){
              include 'login.php';
              $connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
                            
              $query = "SELECT seatsLeft FROM COURSESECTION WHERE " . "facultyID = '" .$fid."' AND courseID = '".$c."' AND sectionNumber = ".intval($se) ." AND semester ='". $sem."' AND semYear = ".intval($y);
              $result = mysqli_query($connection, $query) or die(mysqli_error());  
              $row = mysqli_fetch_array($result);
              mysqli_free_result($result);
              
              if($row['seatsLeft'] <= 0){
                  return false;
              }
              else{
                  return true;
              }
                  
          }
            // Function to gether the pre-requisites of a course and check if the student has passed the course once
          function containsPreReq($c, $se, $i, $fid, $sem, $y, $username){
              include 'login.php';
              $connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
              
              $numOfPre = 0;
              $numOfPassedPre = 0;
              $query = "SELECT preCourseID FROM COURSEPREQ WHERE courseID = '". $c . "'";
              
              echo $query . "\n";
              
              if(!($result = mysqli_query($connection, $query))){
                  echo "There were no pre-requsites for this course \n";
                  mysqli_free_result($result);
                  return true;
              }
              else{  
                  $numOfPre = mysqli_num_rows($result);
                  while ($row = mysqli_fetch_array($result)){
                      $query2 = "SELECT DISTINCT(courseID) ".
                                "FROM STUDENTREG ".
                                "WHERE studentID = '". $username . "' ".
                                "AND courseID = '". $row['preCourseID'] ."' ".
                                "AND (status = 'Passed' OR ".
                                     "status = 'In Progress' OR ".
                                     "status = 'A' OR ".
                                     "status = 'B' OR ".
                                     "status = 'C') ";
                      echo $query2."\n";
                      if($result2 = mysqli_query($connection, $query2)){
                          $numOfPassedPre = mysqli_num_rows($result2);
                          echo $numOfPassedPre . '\n';
//                          $numOfPassedPre = $numOfPassedPre + 1;
                      }
                      else{
                          // OPTIONAL feature to add which course you did not take
                          // in this else statement, add $row['preCourseID'] to an array
                          // if we have time. 
                      }

                      mysqli_free_result($result2);
                  }
                  
                  // If you have passed all the prereqs, the values will be the same
                  if($numOfPre == $numOfPassedPre){
                      echo "Number of Reqs for course: ".$numOfPre . "\n Number of passed reqs:" . $numOfPassedPre; 
                      return true;
                  }
                  
                  // Otherwise you have failed to take a pre-req
                  else{
                      echo "Number of Requisits: " . $numOfPre ."\n Number of Passed Requisites: ".$numOfPassedPre;
                      return false;
                  } 
                
              }
              
              
          }
          
          // Function to print the Bootstrap modal to the view
          function printModal($stat, $str){
              echo '<div id="myModal" class="modal fade" tabindex="-1" role="dialog">';
              echo      '<div class="modal-dialog" role="document">';
              echo          '<div class="modal-content">';
              echo              '<div class="modal-header">';
              echo                  '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
              echo                  '<h4 class="modal-title">' . $stat . '</h4>';
              echo              '</div>';
              echo              '<div class="modal-body">';
              echo                  '<p>' . $str .'</p>';
              echo              '</div>';
              echo              '<div class="modal-footer">';
              echo                  '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
              echo              '</div>';
              echo          '</div><!-- /.modal-content -->';
              echo      '</div><!-- /.modal-dialog -->';
              echo  '</div><!-- /.modal -->';
              
              echo '<script type="text/javascript">';
              echo      '$(document).ready(function(){';
              echo      "$('#myModal').modal();";
              echo '});';
              echo '</script>';
          }
            
          // Check to see if $_GET variables hav been set and gather them
          if (isset($_GET["c"]) && isset($_GET["se"]) && isset($_GET["i"]) && isset($_GET["fid"]) && isset($_GET["sl"])) {       
              $c = $_GET["c"];
              $se = $_GET["se"];
              $i = $_GET["i"];
              $fid =$_GET["fid"];
              $sem = $_GET["sem"]; 
              $y = $_GET["y"]; 
              $username = $_GET["zz"];  
              
              
              //General Flow
                    //Anyseats? - Yes = containtsPreReqs? 
                    //            No = Print unsuccessfull modal 
                    //containsPreReqs - Yes = Register - Print Successfull modal
                    //                  No = Print unsuccesfull modal
              
              if(anySeatsLeft($c, $se, $i, $fid, $sem, $y, $username)){
                  if(containsPreReq($c, $se, $i, $fid, $sem, $y, $username)){
                        register($c, $se, $i, $fid, $sem, $y, $username);
                        printModal("Success", "You have succesfully registered for this course");
                  } 
                  else{
                    printModal("Unsuccessfull", "You do fullfill the course pre-requsites");
                  }
              }
              else{
                    printModal("Unsuccessfull", "There are no more seats for this course");
              }

          }

          ?>
              <br/>
    </tbody>
    </table>
  </div><!-- /container -->
</body>
</html>
