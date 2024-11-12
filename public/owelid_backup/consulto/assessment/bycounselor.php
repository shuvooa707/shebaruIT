<?php
/*
#Assessment by counselor
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>
<?php
	$query_assessment = "SELECT * FROM assessment WHERE counselor_id = ".$_GET['id']." AND active = 1 ORDER BY form_no DESC";
	$result_query_assessment = mysqli_query($conn, $query_assessment);
	$result_count_assessment = mysqli_num_rows($result_query_assessment);
	
	$query_assessment_direct = "SELECT * FROM assessment WHERE appointed_to = ".$_GET['id']." AND active = 1 ORDER BY form_no DESC";
	$result_query_assessment_direct = mysqli_query($conn, $query_assessment_direct);
	$result_count_assessment_direct = mysqli_num_rows($result_query_assessment_direct);
?>
<?php
	$query_counselor = "SELECT * from user WHERE approval=1 ORDER BY e_id";
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
            <h3 class="page-header">Assessment Form of <b><?php echo $row_counselor_name['name']; ?></b>
				<select style="font-size:16px;background-color: #779126;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;padding:5px 15px;color:white" class="pull-right" onchange="document.location.href=this.value">
					<option value="">Select by Counselor</option>
					<?php while($row_counselor=mysqli_fetch_assoc($result_counselor)){ ?>
					<option value="/admin/assessment/bycounselor.php?id=<?php echo $row_counselor['id']; ?>"><?php echo $row_counselor['name']; ?></option>
					<?php } ?>
				</select>
			</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	

	<div class="row">
		<div class="col-md-6">
			<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: <?php echo $result_count_assessment; ?></div></div>
			<div class="panel panel-primary">
				<div class="panel-heading">Personal Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-primary'>Total Available: <?php echo $result_count_assessment; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment = mysqli_fetch_assoc($result_query_assessment)) {
						?>
							<a href="view-assessment.php?id=<?php echo $row_query_assessment['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment['form_no']; ?></span> <?php echo $row_query_assessment['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row-->    
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: <?php echo $result_count_assessment_direct; ?></div></div>
			<div class="panel panel-info">
				<div class="panel-heading">Assigned Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-info'>Total Available: <?php echo $result_count_assessment_direct; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_direct = mysqli_fetch_assoc($result_query_assessment_direct)) {
						?>
							<a href="view-assessment.php?id=<?php echo $row_query_assessment_direct['id']; ?>">
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
</div>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php'); ?>