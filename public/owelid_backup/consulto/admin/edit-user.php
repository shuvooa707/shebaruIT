<?php
/*
#Admin
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>
<?php
//show user data
$query_user = "SELECT * FROM user WHERE id='".$_GET['id']."'";
$result_user = mysqli_query($conn,$query_user) or die(mysql_error());
$result_count_user = mysqli_num_rows($result_user);
$row_user = mysqli_fetch_assoc($result_user);
if(isset($_GET['id']) && isset($_POST['reset-submit']))
{
	$id = mysqli_real_escape_string($conn, $_GET['id']);
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
				<h3 class="page-header">EDIT USER</h3>
		</div>
		  <!-- /.col-lg-12 -->
	 </div>
	 <!-- /.row -->   

	
	<div class="row">
		<div class="col-lg-3" >
			
			<img src="<?php echo $APP_PATH; ?>profile/uploades/medium/<?php echo $row_user["photo"]; ?>" class="img-circle img-responsive" style="border:solid 1px #C0C0C0;width:250px; height:250px; margin-top:15px; margin-bottom:15px">
			
			<div class="panel-group">
			  	<div class="panel panel-info">
				 	<div class="panel-heading">
						<h4 class="panel-title">
						  	<a data-toggle="collapse" href="#collapse1">Reset Password</a>
						</h4>
				 	</div>
				 	<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							<form role="form" method="POST" action="">
								<div class="form-group">
									<label>Password</label>
									<input class="form-control" type="password" name="password" placeholder="Type Password" autocomplete="off" data-validation="strength" data-validation-length="min8" required>
								</div>
								<div class="form-group ">
									<label>Confirm Password</label>
									<input class="form-control" type="password" name="conf_pass" placeholder="Retype Password" autocomplete="off" data-validation="confirmation" data-validation-confirm="password" required>
								</div>
								<button class="btn btn-info" type="submit" name="reset-submit">Reset Password</button>
							</form>
						</div>
					</div>
			  	</div>
			</div>
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
		</div>
		<div class="col-lg-8">
		
			<?php if(isset($_POST['submit']))
			{
				if(isset($_POST['approval']))
					$approval=",approval = ".$_POST['approval'];
				else
					$approval=",approval = 0";
				
				$query_update_user = "UPDATE user 
										SET e_id = '".$_POST['e_id']."',
											username = '".$_POST['username']."',
											name = '".$_POST['name']."',
											designation = '".$_POST['designation']."',
											phone1 = '".$_POST['phone1']."',
											phone2 = '".$_POST['phone2']."',
											pphone = '".$_POST['pphone']."',
											email = '".$_POST['email']."',
											usergroup = '".$_POST['usergroup']."'".$approval."
										WHERE id='".$_GET['id']."'";
				
				if (mysqli_query($conn, $query_update_user))
				{
					//show updated user information
					$query_user = "SELECT * FROM user WHERE id='".$_GET['id']."'";
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
			<strong>Error!</strong> Something went wrong. Please contact to administrator.
			<?php echo mysqli_error($conn); ?>
			</div>
			<?php
				}
			
			}
			?>
			

			<div style="padding-bottom:20px" class="text-info">
				<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
			</div>
			<form role="form" method="POST" enctype="multipart/form-data" action="">
				
				<h2>Approval</h2>
				<label class="switch">
				  <input name="approval" type="checkbox" <?php if($row_user['approval']==1) echo "checked"; ?> value="1">
				  <span class="slider round"></span>
				</label>

				<div class="row">
					<div class="form-group col-lg-3">
						<label>Employee ID</label>
						<input class="form-control" type="text" name="e_id" placeholder="Employee ID" value="<?php echo $row_user['e_id']; ?>">
					</div>
					<div class="form-group col-lg-9">
						<label>Username</label>
						<input class="form-control" type="text" name="username" placeholder="username" value="<?php echo $row_user['username']; ?>">
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
				<div class="form-group">
					<label>User Group</label>
					<input class="form-control" type="text" name="usergroup" placeholder="User Group" value="<?php echo $row_user['usergroup']; ?>">
				</div>

				<button type="submit" name="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
			</form>
			
		</div>
		<!-- /.col-lg-8 -->  
	</div>
			
</div>
<!-- /#page-wrapper -->
	

	

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>
