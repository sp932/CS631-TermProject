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

<title>Class Registration Login</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	  <link href="css/style.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <link href="css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/dataTables.tableTools.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="bootstrap/ie-emulation-modes-warning.js"></script><style type="text/css"></style>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="bootstrap/ie10-viewport-bug-workaround.js"></script>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.js"></script>
    <script src="js/dataTables.tableTools.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
</head>
<body>

  <div class="wrapper">
    <form class="form-signin" action="welcome.php" method="POST">
    <!-- <form class="form-signin"> -->
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
      <input type="password" class="form-control" name="password" placeholder="Password" required=""/>
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
  </div>

</body>
</html>
