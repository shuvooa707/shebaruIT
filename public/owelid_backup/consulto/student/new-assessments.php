<?php
/*
#Assessment
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">New Assessments</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	


<?php
	if($row_user['usergroup'] == "counselor")
	{
		$counselor_cond = " WHERE counselor_id = ".$row_user['id'];
		$couns_cond = "counselor_id = ".$row_user['id']." AND";
	}
	else
	{
		$counselor_cond = "";
		$couns_cond = "";
	}
	
	$query_distinct  = "SELECT DISTINCT(assessment_id) FROM assessment_comments".$counselor_cond;
	$result_distinct = mysqli_query($conn,$query_distinct) or die(mysqli_error($conn));
	$result_count_distinct = mysqli_num_rows($result_distinct);
	
	$query_unappointed  = "SELECT * FROM assessment WHERE counselor_id = 0 AND appointed_to = 0";
	$result_unappointed = mysqli_query($conn,$query_unappointed) or die(mysqli_error($conn));
	$result_count_unappointed = mysqli_num_rows($result_unappointed);
	
	$query_assessment  = "SELECT * FROM assessment WHERE ".$couns_cond." id NOT IN (SELECT DISTINCT(assessment_id) FROM assessment_comments $counselor_cond)";
	$result_assessment = mysqli_query($conn,$query_assessment) or die(mysqli_error($conn));
	$result_count_assessment = mysqli_num_rows($result_assessment);
	

?>

<?php if (mysqli_num_rows($result_assessment) > 0) { ?>
	<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: <?php echo mysqli_num_rows($result_assessment); ?></div></div>
	<div class="row">
        <div class="col-lg-9">
			<div class="row">
			<?php							
			// output data of each row
			while($row_query_assessment = mysqli_fetch_assoc($result_assessment)) {
			?>
					<a href="view-assessment.php?id=<?php echo $row_query_assessment['id']; ?>">
					<div class="col-md-4">
						<div class="well" style="height:100px">
							<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment['form_no']; ?></span> <?php echo $row_query_assessment['name']; ?> </h4>
						</div>
					</div>
					</a>
					
			<?php } ?>
			<?php }	
			else
			{
			?>
				<span class="text-default"><h2>Welldone! all new assessments have been followed up.</h2></span>
			<?php }	?>
			</div>
		</div>
		<div class="col-lg-3">			
			<div class="panel panel-primary">
			  <div class="panel-heading">Unappointed Assessments</div>
			  <div class="panel-body">
				  <?php echo $result_count_unappointed; ?> unappointed assessments<br><br>
				  <a href="unappointed-assessments.php" class="btn btn-info">Check Now</a>
			  </div>
			</div>
		</div>
		
	</div>
</div>
<!-- /#page-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php'); ?>
