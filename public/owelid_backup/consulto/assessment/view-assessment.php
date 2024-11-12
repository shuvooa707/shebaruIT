<?php
/*
#Assessment
*/
?>
<?php date_default_timezone_set("Asia/Dhaka");  ?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php'); ?>
<?php
if(isset($_POST['submit-close']))
{
	$assessment_id = mysqli_real_escape_string($conn, $_GET['id']);
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	$query_close = "UPDATE assessment SET active = 0 WHERE id = $assessment_id";
	$result_query_close = mysqli_query($conn, $query_close) or die(mysqli_error($conn));
	$query_insert = "INSERT INTO assessment_comments (comment, assessment_id, counselor_id) VALUES ('".$comment."',".$assessment_id.",".$_POST['counselor'].")";
	$result_query_insert = mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
	
	if($result_query_insert)
	{
		header("Location: view-assessment.php?id=$assessment_id&close=success");
	}
}
if(isset($_POST['submit-retrieve']))
{
	$assessment_id = mysqli_real_escape_string($conn, $_GET['id']);
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	$query_close = "UPDATE assessment SET active = 1 WHERE id = $assessment_id";
	$result_query_close = mysqli_query($conn, $query_close) or die(mysqli_error($conn));
	$query_insert = "INSERT INTO assessment_comments (comment, assessment_id) VALUES ('".$comment."',".$assessment_id.")";
	if($comment!="") $result_query_insert = mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
	
	if($result_query_insert)
	{
		header("Location: view-assessment.php?id=$assessment_id&close=success");
	}
}
?>
<?php
if(isset($_POST['submit-comment']))
{
	$assessment_id = mysqli_real_escape_string($conn, $_GET['id']);
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	$query_insert = "INSERT INTO assessment_comments (comment, date, assessment_id, counselor_id) VALUES ('".$comment."',"."'".date("Y-m-d H:i:s")."',".$assessment_id.",".$_POST['counselor'].")";
	$result_query_insert = mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
	
	if($result_query_insert)
	{
		header("Location: view-assessment.php?id=$assessment_id&comment=success");
	}
}
?>
<?php
if(isset($_GET['nt']))
{
	$notification_id = mysqli_real_escape_string($conn, $_GET['nt']);
	$update_notification = "UPDATE notification SET seen=1 WHERE id = ".$notification_id;
	$result_update_notification = mysqli_query($conn, $update_notification) or mysqli_error($conn);
}
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>

<?php
if(isset($_GET['id']))
{
	$assessment_id = mysqli_real_escape_string($conn, $_GET['id']);
	
	$query_assessment = "SELECT * FROM assessment WHERE id=".$assessment_id;
	$result_query_assessment = mysqli_query($conn, $query_assessment);
	$row_query_assessment = mysqli_fetch_assoc($result_query_assessment);
	
	if($row_query_assessment['counselor_id'] != 0)		
		$cond_id = $row_query_assessment['counselor_id'];
	else
		$cond_id = $row_query_assessment['appointed_to'];
	
	$query_counselor = "SELECT * FROM user WHERE id=".$cond_id;
	$result_query_counselor = mysqli_query($conn, $query_counselor);
	$row_query_counselor = mysqli_fetch_assoc($result_query_counselor);
	
	$assign_counselor = "SELECT * FROM user WHERE id=".$row_query_assessment['appointed_to'];
	$result_assign_counselor = mysqli_query($conn, $assign_counselor);
	$row_assign_counselor = mysqli_fetch_assoc($result_assign_counselor);

	$entry_date = date( 'd-M-Y', strtotime($row_query_assessment['date']) );

?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Assessment Form
			<?php if(($row_query_assessment['active']==0)){ ?>
			<button class="btn btn-success" data-toggle="modal" data-target="#retrieve-file" title="Retrieve from Archive"><i class="fa fa-reply fa-fw" aria-hidden="true"></i> Retrieve Assessment</button>
			<?php } ?>
			</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>

	<div class="hidden-print">
	<?php if($row_query_assessment['active']==1){ ?>
		<a href="add-new.php"><button class="btn btn-primary"><i class="fa fa-plus fa-fw"></i> ADD</button></a>
		<a href="edit.php?id=<?php echo $row_query_assessment['id']; ?>"><button class="btn btn-info" ><i class="fa fa-pencil fa-fw"></i> EDIT</button></a>
		<span class="pull-right">
		<a href="../student/file-submit.php?id=<?php echo $row_query_assessment['id']; ?>"><button class="btn btn-success"><i class="fa fa-address-book-o fa-fw"></i> Submit File</button></a>
		<a href="transfer.php?id=<?php echo $row_query_assessment['id']; ?>"><button class="btn btn-default"><i class="fa fa-exchange fa-fw"></i> Transfer Ownership</button></a>
		<button class="btn btn-danger" data-toggle="modal" data-target="#close-file" title="Move to Archive"><i class="fa fa-close fa-fw" aria-hidden="true"></i> Close Assessment</button>
		</span>
		<hr>
	<?php } ?>
	</div>

	<?php
	if(isset($_GET['comment']))
		echo "<div class='alert alert-success'>Success!</div>";

	if(isset($_GET['close']))
		echo "<div class='alert alert-success'>Successfully closed. <a href='index.php' class='btn btn-success btn-sm'><i class='fa fa-level-up'></i> Go Back</a></div>";
	?>

	<div class="row">
		<div class="col-md-4 print-md-4"><h4>#<?php echo $row_query_assessment['form_no']; ?></h4></div>
		<div class="col-md-4 print-md-4">
			<h4>
				<?php 
				if($row_query_assessment['counselor_id']==0) echo "Direct<br> Assigned to: ". $row_query_counselor['name'];
				else echo $row_query_counselor['name'];
				
				if($row_query_assessment['counselor_id']!=0 && $row_query_assessment['appointed_to']!=0) echo "<br> Assigned to: ". $row_assign_counselor['name'];
				?>
			</h4>
		</div>
		<div class="col-md-4 print-md-4"><h4><?php echo $entry_date; ?></h4></div>
	</div>
	<div class="row">
		<div class="col-md-4 print-md-4" style="margin-top:20px">
			<p><strong>Name:</strong> <?php echo $row_query_assessment['name']; ?> <br></p>
			<p><strong>Father's Name:</strong> <?php echo $row_query_assessment['father_name']; ?><br></p>
			<p><strong>Date of Birth:</strong> <?php echo $row_query_assessment['dob']; ?> <br></p>
			<p><strong>Program:</strong> <?php echo $row_query_assessment['program']; ?> <br></p>
			<p><strong>Subject:</strong> <?php echo $row_query_assessment['subject']; ?> <br></p>
		</div>
		<div class="col-md-4 print-md-4" style="margin-top:20px">
			<p><strong>English:</strong> <?php echo $row_query_assessment['english']; ?> <br></p>		
			<p><strong>Score:</strong> <?php echo $row_query_assessment['score']; ?><br></p>
			<p><strong>Passport:</strong> <?php if($row_query_assessment['passport']==1) echo "Available"; else echo "Not available"; ?> <br></p>
			<p><strong>Job Experience:</strong> <?php echo $row_query_assessment['job_exp']; ?> <br></p>
			<p><strong>Know About Us:</strong> <?php echo $row_query_assessment['know_us']; ?> <br></p>
		</div>
		<div class="col-md-4 print-md-4" style="margin-top:20px">
			<p><strong>Contact 1:</strong> <?php echo $row_query_assessment['phone1']; ?> <br></p>
			<p><strong>Contact 2:</strong> <?php echo $row_query_assessment['phone2']; ?> <br></p>
			<p><strong>Email:</strong> <?php echo $row_query_assessment['email']; ?> <br></p>
			<p><strong>Address:</strong> <?php echo $row_query_assessment['address']; ?> <br></p>
		</div>
    </div><!--/row-->   
	
	<?php 
	$certificate = explode(",",$row_query_assessment['certificate']);
	$year = explode(",",$row_query_assessment['year']);
	$cgpa = explode(",",$row_query_assessment['cgpa']);
	$group = explode(",",$row_query_assessment['study_group']);
	$board = explode(",",$row_query_assessment['board']);
	?>
	
	
	<h4>Academic Result</h4>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>					
				<th>Certificate</th>
				<th>Passing Year</th>
				<th>CGPA/Class</th>
				<th>Group</th>				
				<th>Board</th>
			</tr>
		</thead>
		<tbody>
		<?php for($x=0;$x<sizeof($certificate);$x++) { ?>        
			<div class="list-group">
				<tr>							
					<td><?php echo $certificate[$x]; ?></td>
					<td><?php echo $year[$x]; ?></td>
					<td><?php echo $cgpa[$x]; ?></td>
					<td><?php echo $group[$x]; ?></td>				
					<td><?php echo $board[$x]; ?></td>
				</tr>			 
			</div>
		<?php }	?>
		</tbody>
	</table>

	<hr>
<?php
	$query_comments = "SELECT * FROM assessment_comments WHERE assessment_id=".$assessment_id;
	$result_comments = mysqli_query($conn, $query_comments) or mysqli_error($conn);
	$result_count_comments = mysqli_num_rows($result_comments) or mysqli_error($conn);
	if($result_count_comments > 0){
?>
	<h4>Comments</h4>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>					
				<th>Date</th>
				<th>Comments</th>
				<th>Commenter</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		while($row_comments = mysqli_fetch_assoc($result_comments)) { 
		$query_comments_counselor = "SELECT * FROM user WHERE id=".$row_comments['counselor_id'];
		$result_comments_counselor = mysqli_query($conn, $query_comments_counselor) or mysqli_error($conn);
		$row_comments_counselor = mysqli_fetch_assoc($result_comments_counselor)
		?>
			<div class="list-group">
				<tr>							
					<td><?php echo date('M j Y g:i A',strtotime($row_comments['date'])); ?></td>
					<td><?php echo $row_comments['comment']; ?></td>
					<td><?php echo $row_comments_counselor['name']; ?></td>
				</tr>			 
			</div>
		<?php }	?>
		</tbody>
	</table>
	<?php } ?>
	<button class="btn btn-primary hidden-print" data-toggle="collapse" data-target="#comment-form" style="margin-bottom:20px">Add Comments</button>
	
	<form method="post" id="comment-form" class="collapse">
		<input type="hidden" name="counselor" value="<?php echo $row_user['id']; ?>">
		<div class="form-group">
			<textarea name="comment" class="form-control" rows="3" id="comment" placeholder="Write comments here."></textarea>
		</div>
		<button type="submit" name="submit-comment" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
	</form>

<?php } ?>	

</div>
<!-- /#page-wrapper -->

	
<div class="modal fade" id="close-file" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<form role="form" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Move to Archive</h4>
			</div>
			<div class="modal-body">	
				<input type="hidden" name="counselor" value="<?php echo $row_user['id']; ?>">
				<div class="form-group">
					<label>Comment <span class="compulsory">*</span></label>
					<textarea rows="3" class="form-control" name="comment" placeholder="Why do you want to close this assessment?" data-validation="required"></textarea>
				</div>			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" name="submit-close" class="btn btn-primary">Submit</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="retrieve-file" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<form role="form" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Retrieve from Archive</h4>
			</div>
			<div class="modal-body">			
				<div class="form-group">
					<label>Comment</label>
					<textarea rows="3" class="form-control" name="comment" placeholder="Why do you want to retrieve this assessment?"></textarea>
				</div>			
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" name="submit-retrieve" class="btn btn-primary">Submit</button>
			</div>
		</form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>