<?php
/*
#Assessment
*/
?>
<?php require_once(__DIR__.'/../header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Closed Assessment Form</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
<?php
if($row_user['usergroup']=="admin")
{
	$query_assessment_my = "SELECT * FROM assessment WHERE counselor_id = ".$row_user['id']." AND active = 0 ORDER BY form_no DESC";
	$result_query_assessment_my = mysqli_query($conn, $query_assessment_my);
	$result_count_assessment_my = mysqli_num_rows($result_query_assessment_my);
	
	$query_assessment_direct = "SELECT * FROM assessment WHERE appointed_to = ".$row_user['id']." AND active = 0 ORDER BY form_no DESC";
	$result_query_assessment_direct = mysqli_query($conn, $query_assessment_direct);
	$result_count_assessment_direct = mysqli_num_rows($result_query_assessment_direct);
?>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">My Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-primary'>Total Available: <?php echo $result_count_assessment_my; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_my = mysqli_fetch_assoc($result_query_assessment_my)) {
						?>
							<a href="/admin/assessment/view-assessment.php?id=<?php echo $row_query_assessment_my['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment_my['form_no']; ?></span> <?php echo $row_query_assessment_my['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row-->    
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">Assigned Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-info'>Total Available: <?php echo $result_count_assessment_direct; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_direct = mysqli_fetch_assoc($result_query_assessment_direct)) {
						?>
							<a href="/admin/assessment/view-assessment.php?id=<?php echo $row_query_assessment_direct['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-info"><span class="label label-info pull-right">#<?php echo $row_query_assessment_direct['form_no']; ?></span> <?php echo $row_query_assessment_direct['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row--> 
				</div>
			</div>
		</div>
	</div>
	
<?php	
} // if admin
?>
<?php
if($row_user['usergroup']=="counselor")
{
	$query_assessment_my = "SELECT * FROM assessment WHERE counselor_id = ".$row_user['id']." AND active = 0 ORDER BY form_no DESC";
	$result_query_assessment_my = mysqli_query($conn, $query_assessment_my);
	$result_count_assessment_my = mysqli_num_rows($result_query_assessment_my);
	
	$query_assessment_direct = "SELECT * FROM assessment WHERE appointed_to = ".$row_user['id']." AND active = 0 ORDER BY form_no DESC";
	$result_query_assessment_direct = mysqli_query($conn, $query_assessment_direct);
	$result_count_assessment_direct = mysqli_num_rows($result_query_assessment_direct);
?>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">My Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-primary'>Total Available: <?php echo $result_count_assessment_my; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_my = mysqli_fetch_assoc($result_query_assessment_my)) {
						?>
							<a href="/admin/assessment/view-assessment.php?id=<?php echo $row_query_assessment_my['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment_my['form_no']; ?></span> <?php echo $row_query_assessment_my['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row-->    
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">Assigned Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-info'>Total Available: <?php echo $result_count_assessment_direct; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_direct = mysqli_fetch_assoc($result_query_assessment_direct)) {
						?>
							<a href="/admin/assessment/view-assessment.php?id=<?php echo $row_query_assessment_direct['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-info"><span class="label label-info pull-right">#<?php echo $row_query_assessment_direct['form_no']; ?></span> <?php echo $row_query_assessment_direct['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row--> 
				</div>
			</div>
		</div>
	</div>
	
<?php	
} // if counselor
else
{
?>

<?php
$query_assessment = "SELECT * FROM assessment WHERE active = 0 ORDER BY form_no DESC";
$result_query_assessment = mysqli_query($conn, $query_assessment);
$result_count_assessment = mysqli_num_rows($result_query_assessment);
?>
	<div style='margin-bottom:20px; font-size:18px;'><div class='label label-primary'>Total Available: <?php echo $result_count_assessment; ?></div></div>
	
    <div class="row">
<?php
// output data of each row
while($row_query_assessment = mysqli_fetch_assoc($result_query_assessment)) {
?>
		<a href="/admin/assessment/view-assessment.php?id=<?php echo $row_query_assessment['id']; ?>">
		<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="well" style="height:100px">
				<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment['form_no']; ?></span> <?php echo $row_query_assessment['name']; ?> </h4>
			</div>
		</div>
		</a>
		
<?php } ?>

    </div><!--/row-->
<?php } ?>	
</div>
<!-- /#page-wrapper -->

<?php require_once(__DIR__.'/../footer.php'); ?>