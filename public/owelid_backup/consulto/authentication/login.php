<?php
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php'); 
session_start();

//get company information
$query_company = "SELECT * FROM company_info";
$result_company = mysqli_query($conn, $query_company);
$row_company = mysqli_fetch_array($result_company);

// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($conn,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	
	//Checking is user existing in the database or not
    $query = "SELECT * FROM `user` WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username'] = $username;
            // Redirect user to index.php
	    header("Location: ../");
		
         }else{
	header("Location: login.php?attempt=1");
	
	}
    }else{
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login :: <?php echo $row_company['name']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    
	<!-- Custom CSS -->
    <link href="../css/login-only.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style>
	/* make animation */
	.shake {
	  animation: shake 0.82s cubic-bezier(.36,.07,.19,.97) both;
	  transform: translate3d(0, 0, 0);
	  backface-visibility: hidden;
	  animation-delay: 2s;
	}

	@keyframes shake {
	  10%, 90% {
		transform: translate3d(-1px, 0, 0);
	  }
	  
	  20%, 80% {
		transform: translate3d(2px, 0, 0);
	  }

	  30%, 50%, 70% {
		transform: translate3d(-4px, 0, 0);
	  }

	  40%, 60% {
		transform: translate3d(4px, 0, 0);
	  }
	}
	</style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				
				<?php if(isset($_GET['approval']) && $_GET['approval']==0) { ?>
				<div class="alert alert-danger" style="margin-top:40px;margin-bottom:-40px;">
					<p><i class="fa fa-info-circle fa-fw pull-left" style="font-size:40px;margin-top:-10px"></i> Your access has not been approved. Please contact the administrator.</p>
				</div>
				<?php } ?>
				<?php if(isset($_GET['attempt']) && $_GET['attempt']==1) { ?>
				<div class="alert alert-danger" style="margin-top:40px;margin-bottom:-60px;">
					<p><i class="fa fa-info-circle fa-fw pull-left" style="font-size:40px;margin-top:-10px"></i> Incorrect Login. Please try again.</p>
				</div>
				<?php } ?>
				
				<div class="login-panel panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-lock"></i> Login</h3>
					</div>
					<div class="panel-body row" style="padding-top:30px">
						<div class="col-md-4 col-sm-4 col-xs-4">
							<img src="../<?php echo $row_company['logo']; ?>" class="img-rounded" alt="logo" width="100%">
						</div>
						<div class="col-md-8 col-sm-8 col-xs-8">
							<form role="form" method="POST">
								<fieldset>
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input class="form-control" placeholder="Username" name="username" type="text" autofocus >
									</div>
									<div style="margin-bottom: 25px" class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input class="form-control" placeholder="Password" name="password" type="password" value="">
									</div>
									<!-- Change this to a button or input when using this as a form -->
									<input name="submit" class="btn btn-success" style="margin-bottom:20px" type="submit" value="Login">
									<div style="float:right; font-size: 80%; position: relative; " <?php if (isset($_GET['attempt'])) echo "class='shake'"; ?>><a href="forgotpassword.php" style="color:#f36b1c">I forgot my password?</a></div>
									<!--<a href="login-recovery.php" target="blank">I am having problem to login</a>-->
								</fieldset>
							</form>
						</div>
						
					</div>
				</div>
					
				

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>


	<?php } ?>