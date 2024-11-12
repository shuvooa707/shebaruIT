<?php
/*
#Assessment by counselor
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>
<?php
	$query_counselor = "SELECT * from user WHERE approval=1 ORDER BY e_id AND id = ".$_GET['id'];
	$result_counselor = mysqli_query($conn, $query_counselor) or mysqli_error($conn);
?>
<?php
	$query_counselor_name = "SELECT * from user WHERE id = ".$_GET['id'];
	$result_counselor_name = mysqli_query($conn, $query_counselor_name) or mysqli_error($conn);
	$row_counselor_name=mysqli_fetch_assoc($result_counselor_name);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">New Assessment Form of <b><?php echo $row_counselor_name['name']; ?></b>
				<select style="font-size:16px;background-color: #779126;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;padding:5px 15px;color:white" class="pull-right" onchange="document.location.href=this.value">
					<option value="">Select by Counselor</option>
					<?php while($row_counselor=mysqli_fetch_assoc($result_counselor)){ ?>
					<option value="/admin/assessment/newbycounselor.php?id=<?php echo $row_counselor['id']; ?>"><?php echo $row_counselor['name']; ?></option>
					<?php } ?>
				</select>
			</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	


<?php
	if($row_user['usergroup'] == "counselor")
	{
		$counselor_cond = " WHERE counselor_id = ".$row_user['id'];
		$couns_cond = "(counselor_id = ".$row_user['id']." OR appointed_to = ".$row_user['id'].") AND";
	}
	else
	{
		$counselor_cond = "";
		$couns_cond = "";
	}
	if(isset($_GET['id']))
	{
		$counselor_cond = " WHERE counselor_id = ".$_GET['id'];
		$couns_cond = "(counselor_id = ".$_GET['id']." OR appointed_to = ".$_GET['id'].") AND";
	}
	$query_assessment  = "SELECT * FROM assessment WHERE ".$couns_cond." id NOT IN (SELECT DISTINCT(assessment_id) FROM assessment_comments) ORDER BY form_no DESC";
	$result_assessment = mysqli_query($conn,$query_assessment) or die(mysqli_error($conn));
	$result_count_assessment = mysqli_num_rows($result_assessment);
	

?>

<?php if (mysqli_num_rows($result_assessment) > 0) { ?>
	<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: <?php echo mysqli_num_rows($result_assessment); ?></div></div>

	<div class="row">
		<?php							
		// output data of each row
		while($row_query_assessment = mysqli_fetch_assoc($result_assessment)) {
		?>
				<a href="view-assessment.php?id=<?php echo $row_query_assessment['id']; ?>">
				<div class="col-lg-3 col-sm-6 col-xs-12">
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
<!-- /#page-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php'); ?>
