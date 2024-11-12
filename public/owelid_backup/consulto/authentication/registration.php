<?php
/*
#Authentiction
*/
?>
<?php
require_once(__DIR__.'/../db_conn.php');

if (isset($_POST['register'])){
        // removes backslashes
	$name = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
	$name = mysqli_real_escape_string($conn,$name);
	
	$designation = stripslashes($_REQUEST['designation']);
	$designation = mysqli_real_escape_string($conn,$designation);
	$office = stripslashes($_REQUEST['office']);
	$office = mysqli_real_escape_string($conn,$office);
	$phone1 = stripslashes($_REQUEST['phone1']);
	$phone1 = mysqli_real_escape_string($conn,$phone1);
	$phone2 = stripslashes($_REQUEST['phone2']);
	$phone2 = mysqli_real_escape_string($conn,$phone2);
	$pphone = stripslashes($_REQUEST['pphone']);
	$pphone = mysqli_real_escape_string($conn,$pphone);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn,$email);
	$username = stripslashes($_REQUEST['username']);
	$username = mysqli_real_escape_string($conn,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($conn,$password);
	$password = md5($password);

	//Checking is user existing in the database or not
    $query = "INSERT INTO user(e_id, name, designation, office, username, password, phone1, phone2, pphone, email) VALUES ('".rand()."', '$name', '$designation', '$office', '$username', '$password', '$phone1', '$phone2', '$pphone', '$email')";
    
	echo "<div class='mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2' style='margin-top:20px'>";
	if(mysqli_query($conn,$query))
	{
         // Redirect user to login.php
	    //header("Location: login.php");
		echo "<div class='alert alert-success'>Registration Successful. <br>Please contact IT DESK to approve your registration. You can ony login after it is approved.</div>";
		echo "<h4>Person Resposible for IT DESK:</h4>";
		echo "<p>MD. SALAH UDDIN</p>";
		echo "<p>Senior Counselor & IT Manager</p>";
		echo "<p>Contact: 01778333300</p>";
		echo "If you get approval, please <a href='login.php' class='btn btn-primary'>LOGIN</a>";
		
    }
	else
	{
		echo "<div class='alert alert-danger'>Something was seriously wrong. Please try again.</div>";	
		echo "Error: " . mysqli_error($conn);
	}
	echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration :: Bangladesh Malaysia Study Centre Ltd.</title>

        <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    
	<!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-..-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Bootstrap Custom CSS -->
    <link href="../vendor/bootstrap/css/custom.css" rel="stylesheet">
	
</head>

<body>
    <div class="container">    
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						Sign Up	<span style="float:right; font-size: 85%;"><a href="login.php"><i class="fa fa-lock"></i> Login</a></span>
					</div>
				</div>  
				<div class="panel-body" style="padding:30px">
					<form id="signupform" class="form-horizontal" role="form" method="post">                
						<div class="form-group">
							<label class="col-md-3 control-label">Name <span class="compulsory">*</span></label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="name" placeholder="Your name" data-validation="required">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Designation <span class="compulsory">*</span></label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="designation" placeholder="Your designation" data-validation="required">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Office Location</label>
							<div class="col-md-9">
								<select class="form-control" name="office">
									<option value="Dhaka">Dhaka Office</option>
									<option value="Chittagong">Chittagong Office</option>
									<option value="Uttara">Uttara Office</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Office Mobile 1 <span class="compulsory">*</span></label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="phone1" placeholder="Primary mobile no." data-validation="number">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Office Mobile 2</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="phone2" placeholder="Secondary mobile no.">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Personal Mobile</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="pphone" placeholder="Personal mobile no.">
							</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-md-3 control-label">Email Address</label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="email" placeholder="someone@email.com">
							</div>
						</div>						
						<div class="form-group">
							<label class="col-md-3 control-label">Username <span class="compulsory">*</span></label>
							<div class="col-md-9">
								<input class="form-control" type="text" name="username" placeholder="Username" data-validation="length alphanumeric" 
		 data-validation-length="3-12" 
		 data-validation-error-msg="User name has to be an alphanumeric value (3-12 chars)">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Password <span class="compulsory">*</span></label>
							<div class="col-md-9">
								<input class="form-control" type="password" name="password" data-validation="strength" 
		 data-validation-length="min8">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Confirm Password <span class="compulsory">*</span></label>
							<div class="col-md-9">
								<input class="form-control" type="password" name="confpass" data-validation="confirmation" data-validation-confirm="password">
							</div>
						</div>

						<div class="form-group">
							<!-- Button -->		
							<div class="col-md-offset-3 col-md-9">
								<button id="btn-signup" name="register" type="submit" class="btn btn-info"><i class="fa fa-hand-o-right" aria-hidden="true"></i> Sign Up</button>
							</div>
						</div>
						
						
						
						
					</form>
				 </div>
			</div>   
        </div> 
    </div>
	
	
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-..-2.js"></script>
	
	<!-- Form Validation -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script>
	  $.validate({
		lang: 'en',
		modules : 'security'
	  });
	</script>
</body>
</html>
