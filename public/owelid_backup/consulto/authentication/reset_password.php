<?php
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR . '../db_conn.php');

//reset password
$reset_errors=[];
if(isset($_POST['reset-submit']))
{
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$password = md5($_POST['password']);
	$conf_pass = md5($_POST['conf_pass']);
	
	if($password!==$conf_pass)
		$reset_errors[]="Password was not matched.";
	else
	{
		$query_reset = "UPDATE user SET password='$password' WHERE id=$id";
		$result_reset= mysqli_query($conn, $query_reset);
		if($result_reset)
			$reset_success="Successfully Reset. <a href='login.php'>Login Now</a>";
		else
			$reset_errors[]=mysqli_error($conn);
	}
}
//check hash key
$hash_errors=[];
if(isset($_GET['hash']))
{
	$hash = mysqli_real_escape_string($conn, $_GET['hash']);
	$query_ckeckuser = "SELECT * FROM user WHERE reset_hash = '$hash'";
	$result_ckeckuser = mysqli_query($conn, $query_ckeckuser);
	$row_checkuser = mysqli_fetch_assoc($result_ckeckuser);
	$count_ckeckuser = mysqli_num_rows($result_ckeckuser);
	
	if($count_ckeckuser==0)
		$hash_errors[]="<strong>Security token did not match, I cannot identify you.</strong><br>Please follow the link sent to your email. If you did not get email, <a href='forgotpassword.php'>Send Again</a>";
	elseif($count_ckeckuser>1)
		$hash_errors[]="<strong>More than one matched, I am confused.</strong><br>Please follow the link sent to your email. If you did not get email, <a href='forgotpassword.php'>Send Again</a>";
}
else
	$hash_errors[]="<strong>Unauthorized Access!</strong><br>Please follow the link sent to your email. If you did not get email, <a href='forgotpassword.php'>Send Again</a>";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="icon" type="image/png" href="../favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="../favicon-16x16.png" sizes="16x16" />
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Password Recovery || Bangladesh Malaysia Study Centre Ltd.</title>
  </head>
  <body>
	<nav class="navbar navbar-light bg-info">
	  <a class="navbar-brand text-white" href="/bmscl">
		<img src="../img/logo.png" width="30" class="d-inline-block align-top" alt="">
		Bangladesh Malaysia Study Centre Ltd.
	  </a>
	</nav>
	<div class="container">
		<div class="row justify-content-md-center">
			<?php
			if($hash_errors<>null)
			{
				foreach($hash_errors as $hash_error){
				echo "<div class='alert alert-danger' role='alert' style='margin-top:20px'>$hash_error</div>";
				}
			}
			else
			{
			?>
			<div class="col-md-6 col-sm-8 col-xs-12" style="padding-top:20px">
				<?php
				if($reset_errors<>null)
				{
					foreach($reset_errors as $reset_error){
					echo "<div class='alert alert-danger' role='alert'>$reset_error</div>";
					}
				}
				?>
				<?php if(isset($reset_success)){ ?>
				<div class='alert alert-success' role='alert'><?php echo $reset_success; ?></div>
				<?php } ?>
				<h2>Reset Your Password</h2><br>
				<p>Keep your password safe, you should never disclose the passwords to anyone.</p><br>
				<form method="POST">
					<input type="hidden" name="id" value="<?php echo $row_checkuser['id']; ?>">
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" data-validation="strength" 
		 data-validation-length="min8" required>
					</div>
					<div class="form-group">
						<input type="password" name="conf_pass" class="form-control" placeholder="Confirm Password" data-validation="confirmation" data-validation-confirm="password" required>
					</div>
					<br>
					<button class="btn btn-primary" type="submit" name="reset-submit">Reset Password</button>
				</form>				
			</div>
			<?php } ?>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
