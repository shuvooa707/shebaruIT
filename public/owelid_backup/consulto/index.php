<?php
/*
#dashboard
*/
?>
<?php require_once(__DIR__.'/header.php'); ?>
<?php require_once(__DIR__.'/index.class.php') ?>
<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Dashboard</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<h4>Quick Access</h4>
	<div class="row">
		<div class="col-md-3">
			<a href="<?php echo $APP_PATH; ?>assessment/add-new.php" class="btn btn-lg btn-outline btn-primary btn-social">
				<i class="fa fa-plus"></i> Add New Assessment
			</a>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-3 col-md-6" style="height:150px">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-file-text-o fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?php echo $result_count_assessment; ?></div>
							<div>New Assessments!</div>
						</div>
					</div>
				</div>
				<a href="assessment/new-assessments.php">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<?php //if($row_user['usergroup'] == "admin" OR $row_user['usergroup'] == "superuser") { ?>
		<div class="col-lg-3 col-md-6" style="height:150px">
			<div class="panel panel-red">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-support fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?php echo $result_count_unappointed; ?></div>
							<div style="font-size:11px">Unassigned Assessments</div>
						</div>
					</div>
				</div>
				<a href="assessment/unassigned-assessments.php">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<?php //} ?>
		<div class="col-lg-3 col-md-6" style="height:150px">
			<div class="panel panel-green">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-address-book-o fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge"><?php echo $count_newfile; ?></div>
							<div>New Student Files</div>
						</div>
					</div>
				</div>
				<a href="student/index.php">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
		<div class="col-lg-3 col-md-6" style="height:150px">
			<div class="panel panel-yellow">
				<div class="panel-heading">
					<div class="row">
						<div class="col-xs-3">
							<i class="fa fa-shopping-cart fa-5x"></i>
						</div>
						<div class="col-xs-9 text-right">
							<div class="huge">0</div>
							<div>Not Yet Set!</div>
						</div>
					</div>
				</div>
				<a href="#">
					<div class="panel-footer">
						<span class="pull-left">View Details</span>
						<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
						<div class="clearfix"></div>
					</div>
				</a>
			</div>
		</div>
	</div>
	<!-- /.row -->
	<br>
	<div class="panel panel-primary">
	  <div class="panel-heading"><i class="fa fa-bell-o fa-fw" aria-hidden="true"></i> Reminder</div>
	  <div class="panel-body" style="height:300px; overflow-y:auto">
		<?php
		if($count_gd_alert>0){ 
		while($row_gd_alert = mysqli_fetch_assoc($result_gd_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  The GD number of <strong><?php echo $row_gd_alert['name']; ?></strong> is not available. Please <a href="/bmscl/student/view-student.php?id=<?php echo $row_gd_alert['id']; ?>">Add Now</a>
		</div>
		<?php }} ?>
	  	<?php
		if($count_passport_alert>0){ 
		while($row_passport_alert = mysqli_fetch_assoc($result_passport_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  The passport number of <strong><?php echo $row_passport_alert['name']; ?></strong> is not available. Please <a href="/bmscl/student/view-student.php?id=<?php echo $row_passport_alert['id']; ?>">Add Now</a>
		</div>
		<?php }} ?>
		<?php
		if($count_app_alert>0){ 
		while($row_app_alert = mysqli_fetch_assoc($result_app_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  You still didn't send application for offer letter of <strong><?php echo $row_app_alert['name']; ?></strong>. Please send soon and <a href="/bmscl/student/view-student.php?id=<?php echo $row_app_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_offer_alert>0){ 
		while($row_offer_alert = mysqli_fetch_assoc($result_offer_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  Did you get the offer letter of <strong><?php echo $row_offer_alert['name']; ?></strong>? Please <a href="/bmscl/student/view-student.php?id=<?php echo $row_offer_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_medical_alert>0){ 
		while($row_medical_alert = mysqli_fetch_assoc($result_medical_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  You still didn't send <strong><?php echo $row_medical_alert['name']; ?></strong> for medical checkup. Please send soon and <a href="/bmscl/student/view-student.php?id=<?php echo $row_medical_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_payment1_alert>0){ 
		while($row_payment1_alert = mysqli_fetch_assoc($result_payment1_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  Did you get the EMGS payment of <strong><?php echo $row_payment1_alert['name']; ?></strong>? Please <a href="/bmscl/student/view-student.php?id=<?php echo $row_payment1_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_complete_alert>0){ 
		while($row_complete_alert = mysqli_fetch_assoc($result_complete_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  You still didn't send the complete application of <strong><?php echo $row_complete_alert['name']; ?></strong>. Please send soon and <a href="/bmscl/student/view-student.php?id=<?php echo $row_complete_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_VAL_alert>0){ 
		while($row_VAL_alert = mysqli_fetch_assoc($result_VAL_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  Did you get the VAL of <strong><?php echo $row_VAL_alert['name']; ?></strong>? Please <a href="/bmscl/student/view-student.php?id=<?php echo $row_VAL_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_payment2_alert>0){ 
		while($row_payment2_alert = mysqli_fetch_assoc($result_payment2_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  Did you get the tuition fees, service charge and other fees of <strong><?php echo $row_payment2_alert['name']; ?></strong>? Please <a href="/bmscl/student/view-student.php?id=<?php echo $row_payment2_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_send_sticker_alert>0){ 
		while($row_send_sticker_alert = mysqli_fetch_assoc($result_send_sticker_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  You still didn't send the passport for visa sticker of <strong><?php echo $row_send_sticker_alert['name']; ?></strong>. Please send soon and <a href="/bmscl/student/view-student.php?id=<?php echo $row_send_sticker_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_rcv_sticker_alert>0){ 
		while($row_rcv_sticker_alert = mysqli_fetch_assoc($result_rcv_sticker_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  Did you get the visa sticker of <strong><?php echo $row_rcv_sticker_alert['name']; ?></strong>? Please<a href="/bmscl/student/view-student.php?id=<?php echo $row_rcv_sticker_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_fly_alert>0){ 
		while($row_fly_alert = mysqli_fetch_assoc($result_fly_alert)){
		?>
		<div class="alert alert-warning fade in alert-dismissable">
		  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		  Did <strong><?php echo $row_fly_alert['name']; ?></strong> flew to Malaysia <a href="/bmscl/student/view-student.php?id=<?php echo $row_fly_alert['id']; ?>">Update Here</a>
		</div>
		<?php }} ?>
		<?php
		if($count_gd_alert==0 && $count_passport_alert==0 && $count_app_alert==0 && $count_offer_alert==0 && $count_medical_alert==0 && $count_payment1_alert==0 && $count_complete_alert==0 && $count_VAL_alert==0 && $count_payment2_alert==0 && $count_send_sticker_alert==0 && $count_rcv_sticker_alert==0 && $count_fly_alert==0)
		{ 
			echo "You do not have any reminder. Thank you for actively supporting the company.";
		}
		?>
	  </div>
	</div>
</div>
<!-- /#page-wrapper -->

<?php require_once(__DIR__.'/footer.php'); ?>