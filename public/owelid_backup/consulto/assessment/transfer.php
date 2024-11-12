<?php
/*
#Assessment
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Transfer Ownership</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	

	
	<?php
	
	if(isset($_REQUEST['transfer']))
	{
		$id = $_REQUEST['id'];
		$counselor_id = $_REQUEST['appoint'];
		$change_counselor = "";
		if($row_user['usergroup']=="admin")
		{
			$change_counselor = ", counselor_id = ".$_REQUEST['change_counselor'];
		}
		$query_update = "UPDATE assessment SET appointed_to = " . $counselor_id . $change_counselor . " WHERE id = " . $id;
		$result_update = mysqli_query($conn,$query_update) or die(mysqli_error($conn));

		$query_notification = "INSERT INTO notification(message, link, counselor_id) VALUES ('Assessment Assigned','assessment/view-assessment.php?id=".$id."', $counselor_id)";
		mysqli_query($conn,$query_notification);
		
		
		if($result_update)
			echo "<div class='label label-success'>Successfully Assigned. <a href='view-assessment.php?id=".$id."'>View Assessment</a></div>";
			
	}

	?>
	<div class="clearfix" style='margin-bottom:10px'></div>

	<form method="post" class="form-inline">

		<?php						
			//get the counselor list
			$query_counselor = "SELECT * FROM user ORDER BY e_id";
			$result_query_counselor = mysqli_query($conn, $query_counselor);
			$result_query_counselor1 = mysqli_query($conn, $query_counselor);
		?>   
		
			<select name="appoint" class="form-control">
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
			
			<?php if($row_user['usergroup']=="admin") { ?>
			<select name="change_counselor" class="form-control">
				<option value="0">CHANGE COUNSELOR</option>
				<?php
				if (mysqli_num_rows($result_query_counselor1) > 0) {
					while($row_counselor1 = mysqli_fetch_assoc($result_query_counselor1)) {
				?>
				<option value="<?php echo $row_counselor1["id"]; ?>"><?php echo $row_counselor1["name"]; ?></option>
				<?php
						}
					}
				?>								  
			</select>
			<?php } ?>
					
		<button type="submit" name="transfer" class="btn btn-primary"><i class="fa fa-save"></i> Transfer</button>
	</form>

	
</div>
<!-- /#page-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php'); ?>