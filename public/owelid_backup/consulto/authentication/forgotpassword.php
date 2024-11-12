<?php
require_once('../db_conn.php');
//require('config.php');
//require('PHPMailer/PHPMailerAutoload.php');
if(isset($_POST['email']) & !empty($_POST['email'])){
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$sql = "SELECT * FROM user WHERE email = '$email'";
	$res = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($res);
	if($count == 1){
		$r = mysqli_fetch_assoc($res);
		//$password = $r['password'];
		$reset_hash = md5(rand(999, 99999));
		
		$query_reset_hash = "UPDATE user set reset_hash='".$reset_hash."' WHERE id=".$r['id'];
		$result_reset_hash = mysqli_query($conn,$query_reset_hash) or die(mysqli_error($conn));
		
		$to = $r['email'];
		$subject = "Password Recovery";
		 $message = "
		<html>
		<head>
		<title>Reset Password</title>
		</head>
		<body>
		Please click on the link below to reset your password.<br>
		<a href='http://www.bmscl.com.bd/admin/authentication/reset_password.php?hash=" . $reset_hash . "'>Reset Password</a>
		</body>
		</html>
		";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: salahuddin@bmscl.com.bd";
		if(mail($to, $subject, $message, $headers)){
			$smsg = "A reset link has been sent to your email address. Please check your email.";
		}else{
			$fmsg = "Failed to Recover your password, please try again";
		}
 
	}else{
		$fmsg = "Email does not exist in database";
	}
}
 
 
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
	  <a class="navbar-brand text-white" href="#">
		<img src="../img/logo.png" width="30" class="d-inline-block align-top" alt="">
		Bangladesh Malaysia Study Centre Ltd.
	  </a>
	</nav>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 col-sm-8 col-xs-12" style="padding-top:20px">
				<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
				<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
				
				<h2>Password recovery</h2><br>
				<p>If you have forgot your password please enter your email address below. We will send you an email with more instructions on how to reset your password.</p><br>
				<form method="POST">
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Enter your email" required>
					</div>
					<br>
					<button class="btn btn-primary" type="submit">Reset My Password</button>
				</form>
			</div>
		</div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
