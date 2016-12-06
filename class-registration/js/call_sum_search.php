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
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/dataTables.tableTools.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/ie10-viewport-bug-workaround.js"></script>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.tableTools.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
                
                $('#datepicker').datepicker({
                    format: "yyyy-mm-dd",
                    todayBtn: "linked",
                    clearBtn: "true",
                    orientation: "top auto"
                });
        });
    </script>
    
  

<!--
<script>
    $(document).ready(function() {
    $("#myTable").dataTable();
} );
</script>
 -->
 
   


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
          <li><a href="index.php">Survey Results</a></li>
        <li class="active"><a href="call_sum_search.php">Call Summary Report Search<span class="sr-only">(current)</span></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>   
    
    
    <div class="container">
    <h3><center><strong>Call Summary Report Search</strong></center></h3>
    <p><center>Enter a range of dates below to query the Call Summary Report.</center></p>
    
  
    <form action="call_sum_result.php" method="POST">
    <div class="input-daterange input-group" id="datepicker">
    <input type="text" placeholder="Start Date" class="input-sm form-control" name="start" />
    <span class="input-group-addon">to</span>
    <input type="text" placeholder="End Date" class="input-sm form-control" name="end" />
        </div>
        <br/>
        <input type="submit" value="Search" />
        </form>    
</div>
        
        
<!--
     <center><form action="call_sum_result.php" method="POST">
        Start Date: <input type="text" placeholder="yyyy-mm-dd" name="start" />
         <form action="call_sum_result.php" method="POST">
        End Date: <input type="text" placeholder="yyyy-mm-dd" name="end" />
        <input type="submit" value="Search" />
    </form></center>
        -->
    
  
</body>
</html>