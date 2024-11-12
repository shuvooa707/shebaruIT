<?php
/*
#Profile
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>
<?php
if(isset($row_user['id']) && isset($_POST['reset-submit']))
{
	$id = $row_user['id'];
	$password = md5($_POST['password']);
	$conf_pass = md5($_POST['conf_pass']);

	if($password!==$conf_pass)
		$reset_errors[]="Password was not matched.";
	else
	{
		$query_reset = "UPDATE user SET password='$password' WHERE id=$id";
		$result_reset= mysqli_query($conn, $query_reset);
		if($result_reset)
			$reset_success="Successfully Reset.";
		else
			$reset_errors[]=mysqli_error($conn);
	}
}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">PROFILE EDIT</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
	<div class="row">
		<div class="col-lg-8">
		
			<?php if(isset($_POST['submit']))
			{
				$query_update_user = "UPDATE user 
										SET name = '".$_POST['name']."',
											designation = '".$_POST['designation']."',
											phone1 = '".$_POST['phone1']."',
											phone2 = '".$_POST['phone2']."',
											pphone = '".$_POST['pphone']."',
											email = '".$_POST['email']."'											
										WHERE username='".$row_user['username']."'";
				
				if (mysqli_query($conn, $query_update_user))
				{
					//show updated user information
					$query_user = "SELECT * FROM user WHERE username='".$_SESSION['username']."' AND approval=1";
					$result_user = mysqli_query($conn,$query_user) or die(mysql_error());
					$result_count_user = mysqli_num_rows($result_user);
					$row_user = mysqli_fetch_assoc($result_user);
			?>
			
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Profile updated.<br>
				<?php if(isset($upload_success)) echo $upload_success; ?>
			</div>
			
			<?php 
				}
				else
				{
			?>
			<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> Something went wrong.
			</div>
			<?php
				}
			
			}
			?>
			<?php
			if($reset_errors<>null)
			{
				echo "<div class='alert alert-danger' role='alert'><strong>Password Reset Failed</strong><br>";
				foreach($reset_errors as $reset_error){
				echo "<li>$reset_error</li>";
				}
				echo "</div>";
			}
			?>
			<?php if(isset($reset_success)){ ?>
			<div class='alert alert-success' role='alert'><?php echo $reset_success; ?></div>
			<?php } ?>
			<div style="padding-bottom:20px" class="text-info">
				<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
			</div>
			<!-- Trigger the modal with a button -->

			<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#chng_pass">Change Password</button>
			<hr>
			<div id="chng_pass" class="collapse">
				<form class="form-inline" method="POST" onSubmit="if(!confirm('Are you sure you want to change the password?')){return false;}">
					<div class="form-group" style="vertical-align: top;">
						<input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off" data-validation="strength" data-validation-length="min8" required>
					</div>
					<div class="form-group" style="vertical-align: top;">
						<input class="form-control" type="password" name="conf_pass" placeholder="Confirm Password" autocomplete="off" data-validation="confirmation" data-validation-confirm="password" required>
					</div>
					<button class="btn btn-warning" type="submit" name="reset-submit">Reset</button>
				</form>
				<hr>
			</div>
			<form role="form" method="POST" enctype="multipart/form-data" action="">
				
				<div class="row">
					<div class="form-group col-lg-3">
						<label>Employee ID</label>
						<input class="form-control" type="text" name="name" placeholder="username" value="<?php echo $row_user['e_id']; ?>" disabled>
					</div>
					<div class="form-group col-lg-9">
						<label>Username</label>
						<input class="form-control" type="text" name="name" placeholder="username" value="<?php echo $row_user['username']; ?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label>Name <span class="compulsory">*</span></label>
					<input class="form-control" type="text" name="name" placeholder="Your name" value="<?php echo $row_user['name']; ?>">
				</div>
				<div class="form-group">
					<label>Designation <span class="compulsory">*</span></label>
					<input class="form-control" type="text" name="designation" placeholder="Your designation" value="<?php echo $row_user['designation']; ?>">
				</div>
				<div class="form-group">
					<label>Office Mobile 1 <span class="compulsory">*</span></label>
					<input class="form-control" type="text" name="phone1" placeholder="Primary mobile no." value="<?php echo $row_user['phone1']; ?>">
				</div>
				<div class="form-group">
					<label>Office Mobile 2</label>
					<input class="form-control" type="text" name="phone2" placeholder="Secondary mobile no." value="<?php echo $row_user['phone2']; ?>">
				</div>
				<div class="form-group">
					<label>Personal Mobile</label>
					<input class="form-control" type="text" name="pphone" placeholder="Personal mobile no." value="<?php echo $row_user['pphone']; ?>">
				</div>
				<div class="form-group">
					<label>Email Address</label>
					<input class="form-control" type="text" name="email" placeholder="someone@email.com" value="<?php echo $row_user['email']; ?>">
				</div>
				

				<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
			</form>
			
		</div>
		<!-- /.col-lg-8 -->	
	</div>
			
</div>
<!-- /#page-wrapper -->	

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>