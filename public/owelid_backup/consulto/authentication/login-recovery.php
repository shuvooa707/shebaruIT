<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/admin/db_conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login :: Bangladesh Malaysia Study Centre Ltd.</title>

        <!-- Bootstrap Core CSS -->
    <link href="/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    
	<!-- DataTables CSS -->
    <link href="/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!-- Bootstrap Custom CSS -->
    <link href="/admin/vendor/bootstrap/css/custom.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8" style="top:40px">
				<?php
				if(isset($_POST['submit-email']))
				{
					$email = $_POST['email'];
					$query = "SELECT * FROM user WHERE email='$email'";
					$result = mysqli_query($conn,$query) or die(mysql_error());
					$rows = mysqli_num_rows($result);
					$recovery_data = mysqli_fetch_assoc($result);
					if($rows==1)
					{
						echo "working"; 
					}
					else
						echo "<p class='alert alert-danger'>Email address does not match. Please type a correct email address.</p>";
					
				}
				?>
				<?php
					
					if(isset($_POST['reset']))
					{
						$query = "UPDATE user SET password = '".md5($_POST['password'])."' WHERE username = '".$_POST['username']."'";
						if(mysqli_query($conn,$query))
							echo "<p class='alert alert-success' style='font-size:32px'><i class='fa fa-check-circle-o'></i> Successfully Reset. <a href='login.php' class='btn btn-primary'>Login Now</a></p>";
						
					}
					
					if(isset($_POST['forgotpass']))
					{
						$username = $_POST['username'];
						$query = "SELECT * FROM `user` WHERE username='$username'";
						$result = mysqli_query($conn,$query) or die(mysql_error());
						$rows = mysqli_num_rows($result);
						$recovery_data = mysqli_fetch_assoc($result);
						if($rows==1)
						{
				?>
							<div style="margin-bottom:30px">
								<h3><?php echo $recovery_data['name']; ?></h3>
								<p><?php echo $recovery_data['designation']; ?></p>
								Is this you? <button id="yes" class="btn btn-primary" style="padding:5px 20px; margin:0px 10px;">Yes</button><button id="no" class="btn btn-default"  style="padding:5px 20px;">No</button>
								
								<div class="panel panel-default" style="margin-top:10px" id="showReset">
									<div class="panel-heading">
										Reset Password
									</div>
									<!-- /.panel-heading -->
									<div class="panel-body">
										<form id="reset" method="post" class="form-horizontal" role="form">
											<div class="form-group">
												<label class="col-md-3 control-label">Password</label>
												<div class="col-md-9">
													<input class="form-control" type="password" name="password" data-validation="strength" data-validation-length="min8">
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Confirm Password</label>
												<div class="col-md-9">
													<input class="form-control" type="password" name="confpass" data-validation="confirmation" data-validation-confirm="password">
												</div>
											</div>
											<input type="hidden" value="<?php echo $username; ?>" name="username">

											<div class="form-group">
												<!-- Button -->		
												<div class="col-md-offset-3 col-md-9">
													<button id="btn-signup" name="reset" type="submit" class="btn btn-info"><i class="fa fa-refresh" aria-hidden="true"></i> Reset Password</button>
												</div>
											</div>
										</form>
									</div>
									<!-- /.panel-body -->
								</div>
								<p style="margin-top:10px" id="showNo">We are sorry, we could not help you. Please contact to IT Desk for more help.<br><i class="fa fa-phone" aria-hidden="true"></i> 01778333300
								
							</div>
				<?php
						}
						else
							echo "<p>Username does not match. Please Contact to IT Desk.<br><i class='fa fa-phone' aria-hidden='true'></i> 01778333300</p>";
					}
				?>
				<?php
					if(isset($_POST['forgotuser']))
					{
						$name = stripslashes($_REQUEST['name']);
						$name = mysqli_real_escape_string($conn,$name);
						$designation = stripslashes($_REQUEST['designation']);
						$designation = mysqli_real_escape_string($conn,$designation);
						$phone1 = stripslashes($_REQUEST['phone1']);
						$phone1 = mysqli_real_escape_string($conn,$phone1);
						
						$query = "SELECT * FROM user WHERE name='".$name."' && designation='".$designation."' && phone1='".$phone1."'";
						$result = mysqli_query($conn,$query) or die(mysql_error());
						$rows = mysqli_num_rows($result);
						$recovery_data = mysqli_fetch_assoc($result);
						if($rows==1)
						{
							echo "<p class='alert alert-success' style='font-size:32px'><i class='fa fa-check-circle-o'></i> Your username is <strong>".$recovery_data['username']."</strong>. <a href='login.php' class='btn btn-primary'>Login Now</a></p>";
						}
						else
							echo "<p>No Record Found. Please Contact to IT Desk</p>";
					}
				?>
				
				<div class="panel-group" id="accordion">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
						I forgot my username</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					  <div class="panel-body">
						<form id="forgotusername" class="form-horizontal" role="form" method="post">
							<div class="form-group">
								<label class="col-md-4 control-label">What is your Name?</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="name" placeholder="Your name" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">What is your Designation?</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="designation" placeholder="Your designation" data-validation="required">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">What is your Office Mobile 1 no?</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="phone1" placeholder="Primary mobile no." data-validation="number">
								</div>
							</div>
							<div class="form-group">
								
								<div class="col-md-offset-4 col-md-8">
									<button id="btn-user" name="forgotuser" type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
								</div>
							</div>
						</form>
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						I forgot my password</a>
					  </h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
					  <div class="panel-body">
						<form id="forgotpassword" class="form-horizontal" role="form" method="post">
							<div class="form-group">
								<label class="col-md-4 control-label">What is your username?</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="username" placeholder="Your username" data-validation="required">
								</div>
							</div>
							<div class="form-group">	
								<div class="col-md-offset-4 col-md-8">
									<button id="btn-pass" name="forgotpass" type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
								</div>
							</div>
						</form>
					  </div>
					</div>
				  </div>
				</div> 			
	
		





				<!--
				<div>
					<form id="forgotpassword" class="form-horizontal" role="form" method="post">
						<div class="form-group">
							<label class="col-md-4 control-label">What is your email address?</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="email" placeholder="Please type your email address" data-validation="email">
							</div>
						</div>
						<div class="form-group">
								
							<div class="col-md-offset-4 col-md-8">
								<button id="btn-pass" name="submit-email" type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i> Search</button>
							</div>
						</div>
					</form>
				</div>
				-->
			</div>
		</div>
	</div>
    <!-- jQuery -->
    <script src="/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/admin/vendor/raphael/raphael.min.js"></script>
    <script src="/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="/admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/admin/dist/js/sb-admin-2.js"></script>
	
	<!-- Form Validation -->
	
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
  $.validate({
    lang: 'en',
	modules : 'security'
  });
</script>
<script>
    $(document).ready(function() {
		
		$("#showReset").hide();
		$("#showNo").hide();
		$("#yes").click(function(){
			$("#showNo").hide();
			$("#showReset").show(300);
		});
		$("#no").click(function(){
			$("#showReset").hide();
			$("#showNo").show(300);
		});
    });
    </script>
</body>

</html>