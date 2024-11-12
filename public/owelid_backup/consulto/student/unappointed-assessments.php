<?php
/*
#Assessment
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bmscl/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Unappointed Assessments</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
	
	<?php
	$query_assessment = "SELECT * FROM assessment";
	$result_assessment = mysqli_query($conn,$query_assessment) or die(mysqli_error($conn));
	$result_count_assessment = mysqli_num_rows($result_assessment);
    $row_assessment = mysqli_fetch_assoc($result_assessment);
	
	$query_distinct  = "SELECT DISTINCT(assessment_id) FROM assessment_comments";
	$result_distinct = mysqli_query($conn,$query_distinct) or die(mysqli_error($conn));
	$result_count_distinct = mysqli_num_rows($result_distinct);
	
	$new_assessment = $result_count_assessment - $result_count_distinct;	
	
	
	if(isset($_REQUEST['appoint']))
	{
		$id = $_REQUEST['id'];
		$n=0;
		foreach($_REQUEST['appoint'] as $counselor_id)
		{
			$query_update = "UPDATE assessment SET appointed_to = " . $counselor_id . " WHERE id = " . $id[$n];
			$result_update = mysqli_query($conn,$query_update) or die(mysqli_error($conn));
			$n++;
		}
		if($result_update)
			echo "<span class='label label-success'>Successfully Appointed.</span>";
	}

	?>

	<?php
	$query_unappointed  = "SELECT * FROM assessment WHERE counselor_id = 0 AND appointed_to = 0";
	$result_unappointed = mysqli_query($conn,$query_unappointed) or die(mysqli_error($conn));
	$result_count_unappointed = mysqli_num_rows($result_unappointed);
	?>
	
	<?php if (mysqli_num_rows($result_unappointed) > 0) { ?>
	<div class="row">
        <div class="col-lg-9">
		<form method="post">
			<table width="100%" class="table table-hover">
				<thead>
					<tr>				
						<th>#</th>
						<th>Form No</th>
						<th>Name</th>
						<th>Appoint</th>				
					</tr>
				</thead>
				<tbody>
				
					<?php
						$n = 0;
						
							// output data of each row
							while($row = mysqli_fetch_assoc($result_unappointed)) {
								//for numbering
								$n++;
								
								//get the counselor list
								$query_counselor = "SELECT * FROM user WHERE usergroup = 'counselor' OR usergroup = 'admin' ORDER BY e_id";
								$result_query_counselor = mysqli_query($conn, $query_counselor);
					?>      
							<input type="hidden" name="id[]" value="<?php echo $row["id"]; ?>" />
							<div class="list-group">
								<tr>							
									<td><?php echo $n; ?></td>
									<td><?php echo $row["form_no"]; ?></td>
									<td><?php echo $row["name"]; ?></td>
									<td>
										<select name="appoint[]" class="form-control input-sm">
											<option value="0">SELECT COUNSELOR</option>
											<?php
											if (mysqli_num_rows($result_query_counselor) > 0) {
												while($row_counselor = mysqli_fetch_assoc($result_query_counselor)) {
											?>
											<option value="<?php echo $row_counselor["id"]; ?>"><?php echo $row_counselor["name"]; ?></option>
											<?php
													}
												}
											?>								  
										</select>
									</td>				
								</tr>			 
							</div>
					<?php }	?>
					
				
				</tbody>
			</table>
			<button type="submit" name="submit" class="btn btn-primary" style="margin-top:20px;width:100%"><i class="fa fa-save"></i> Submit</button>
		</form>
			<?php }	
			else
			{
			?>
				<span class="text-success"><h2>Welldone! all the assessments have been appointed.</h2></span>
			<?php }	?>
		</div>
		
		<div class="col-lg-3">
			<div class="panel panel-primary">
			  <div class="panel-heading">New Assessments</div>
			  <div class="panel-body">
				  <?php echo $new_assessment; ?> new assessments.<br><br>
				  <a href="new-assessments.php" class="btn btn-info">Check Now</a>
			  </div>
			</div>
		</div>	
	</div>
</div>
<!-- /#page-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bmscl/footer.php'); ?>
