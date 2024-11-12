<?php
/*
#student
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/db_conn.php'); ?>
<?php
if(isset($_POST['submit-steps']))
{
	$student_id = mysqli_real_escape_string($conn, $_GET['id']);
	$application = mysqli_real_escape_string($conn, $_POST['application']);
	$date_application = mysqli_real_escape_string($conn, $_POST['date_application']);
	$offer_letter = mysqli_real_escape_string($conn, $_POST['offer_letter']);
	$date_offer_letter = mysqli_real_escape_string($conn, $_POST['date_offer_letter']);
	$medical = mysqli_real_escape_string($conn, $_POST['medical']);
	$date_medical = mysqli_real_escape_string($conn, $_POST['date_medical']);
	$payment1 = mysqli_real_escape_string($conn, $_POST['payment1']);
	$date_payment1 = mysqli_real_escape_string($conn, $_POST['date_payment1']);
	$complete_app = mysqli_real_escape_string($conn, $_POST['complete_app']);
	$date_complete_app = mysqli_real_escape_string($conn, $_POST['date_complete_app']);
	$VAL = mysqli_real_escape_string($conn, $_POST['VAL']);
	$date_VAL = mysqli_real_escape_string($conn, $_POST['date_VAL']);
	$payment2 = mysqli_real_escape_string($conn, $_POST['payment2']);
	$date_payment2 = mysqli_real_escape_string($conn, $_POST['date_payment2']);
	$send_sticker = mysqli_real_escape_string($conn, $_POST['send_sticker']);
	$date_send_sticker = mysqli_real_escape_string($conn, $_POST['date_send_sticker']);
	$rcv_sticker = mysqli_real_escape_string($conn, $_POST['rcv_sticker']);
	$date_rcv_sticker = mysqli_real_escape_string($conn, $_POST['date_rcv_sticker']);
	$fly = mysqli_real_escape_string($conn, $_POST['fly']);
	$date_fly = mysqli_real_escape_string($conn, $_POST['date_fly']);

	$steps_process="";
	if($application==1)
		$steps_process=$steps_process."application='".$date_application."', ";
	if($offer_letter==1)
		$steps_process=$steps_process."offer_letter='".$date_offer_letter."', ";
	if($medical==1)
		$steps_process=$steps_process."medical='".$date_medical."', ";
	if($payment1==1)
		$steps_process=$steps_process."payment1='".$date_payment1."', ";
	if($complete_app==1)
		$steps_process=$steps_process."complete_app='".$date_complete_app."', ";
	if($VAL==1)
		$steps_process=$steps_process."VAL='".$date_VAL."', ";
	if($payment2==1)
		$steps_process=$steps_process."payment2='".$date_payment2."', ";
	if($send_sticker==1)
		$steps_process=$steps_process."send_sticker='".$date_send_sticker."', ";
	if($rcv_sticker==1)
		$steps_process=$steps_process."rcv_sticker='".$date_rcv_sticker."', ";
	if($fly==1)
		$steps_process=$steps_process."fly='".$date_fly."', ";
	
	$steps_process = rtrim($steps_process,', ');
	
	$query_steps = "UPDATE student SET $steps_process WHERE id=$student_id";
	$result_query_steps = mysqli_query($conn, $query_steps) or die(mysqli_error($conn));
}
if(isset($_POST['submit-comment']))
{
	$student_id = mysqli_real_escape_string($conn, $_GET['id']);
	$counselor_id = mysqli_real_escape_string($conn, $_POST['counselor_id']);
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	$query_insert = "INSERT INTO student_comments (comment, student_id, counselor_id) VALUES ('".$comment."',".$student_id.",".$counselor_id.")";
	$result_query_insert = mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
	
	if($result_query_insert)
	{
		header("Location: view-student.php?id=$student_id&comment=success");
	}
}
if(isset($_POST['submit-close']))
{
	$student_id = mysqli_real_escape_string($conn, $_GET['id']);
	$counselor_id = mysqli_real_escape_string($conn, $_POST['counselor_id']);
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	$query_close = "UPDATE student SET active = 0 WHERE id = $student_id";
	$result_query_close = mysqli_query($conn, $query_close) or die(mysqli_error($conn));
	$query_insert = "INSERT INTO student_comments (comment, student_id, counselor_id) VALUES ('".$comment."',".$student_id.",".$counselor_id.")";
	$result_query_insert = mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
	
	if($result_query_insert)
	{
		header("Location: view-student.php?id=$student_id&close=success");
	}
}
if(isset($_POST['submit-retrieve']))
{
	$student_id = mysqli_real_escape_string($conn, $_GET['id']);
	$counselor_id = mysqli_real_escape_string($conn, $_POST['counselor_id']);
	$comment = mysqli_real_escape_string($conn, $_POST['comment']);
	$query_close = "UPDATE student SET active = 1 WHERE id = $student_id";
	$result_query_close = mysqli_query($conn, $query_close) or die(mysqli_error($conn));
	$query_insert = "INSERT INTO student_comments (comment, student_id, counselor_id) VALUES ('".$comment."',".$student_id.",".$counselor_id.")";
	if($comment!="") $result_query_insert = mysqli_query($conn, $query_insert) or die(mysqli_error($conn));
	
	if($result_query_insert)
	{
		header("Location: view-student.php?id=$student_id&close=success");
	}
}
if(isset($_POST['submit-passport']))
{
	$student_id = mysqli_real_escape_string($conn, $_GET['id']);
	$passport = mysqli_real_escape_string($conn, $_POST['passport']);
	$query_passport = "UPDATE student SET passport = '$passport' WHERE id=$student_id";
	$result_query_passport = mysqli_query($conn, $query_passport) or die(mysqli_error($conn));
}
if(isset($_POST['submit-GD']))
{
	$student_id = mysqli_real_escape_string($conn, $_GET['id']);
	$gd_no = mysqli_real_escape_string($conn, $_POST['gd_no']);
	$query_gd_no = "UPDATE student SET gd_no = '$gd_no' WHERE id=$student_id";
	$result_query_gd_no = mysqli_query($conn, $query_gd_no) or die(mysqli_error($conn));
}
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>
<?php
if(isset($_GET['id']))
{
	
	$student_id = mysqli_real_escape_string($conn, $_GET['id']);
	
	$query_student = "SELECT * FROM student WHERE id=".$student_id;
	$result_query_student = mysqli_query($conn, $query_student);
	$row_query_student = mysqli_fetch_assoc($result_query_student);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Student Details 
			<?php if(($row_query_student['active']==0)){ ?>
			<button class="btn btn-success" data-toggle="modal" data-target="#retrieve-file" title="Retrieve from Archive"><i class="fa fa-reply fa-fw" aria-hidden="true"></i> Retrieve File</button>
			<?php } ?></h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="/admin">Home</a></li>
	  <li class="breadcrumb-item"><a href="/admin/student">Student</a></li>
	  <li class="breadcrumb-item active">View Student</li>
	</ol>
	<hr>
	<?php if(($row_query_student['active']==1)){ ?>
	<a href="edit-student.php?id=<?php echo $row_query_student['id']; ?>" class="btn btn-default"><i class="fa fa-pencil fa-fw"></i> EDIT</a>
	<span class="pull-right">
	<a href="../assessment/view-assessment.php?id=<?php echo $row_query_student['assessment_id']; ?>" class="btn btn-default"><i class="fa fa-file-text-o fa-fw"></i> View Assessment</a>
	<button class="btn btn-danger" data-toggle="modal" data-target="#close-file" title="Move to Archive"><i class="fa fa-close fa-fw" aria-hidden="true"></i> Close File</button>
	</span>
	<hr>
	<?php } ?>
	<?php
	if(isset($_GET['comment']))
		echo "<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>×</a>Success!</div>";
	?>
	<?php
	if(isset($_GET['close']))
			echo "<div class='alert alert-success'>Successfully closed. <a href='index.php' class='btn btn-success btn-sm'><i class='fa fa-level-up'></i> Go Back</a></div>";
	?>
	
	<div class="progress">
	<?php 
	$progress=0;
	$step = [];
	if($row_query_student['application']!=0) { $progress=$progress+5;
	?>
	  <div class="progress-bar progress-bar-info" role="progressbar" style="width:5%">
		Application
	  </div>
	<?php }
	else {
		$step[] = "application:Send Application";
	}
	
	if($row_query_student['offer_letter']!=0) { $progress=$progress+10; 
	?>	
	  <div class="progress-bar progress-bar-primary" role="progressbar" style="width:10%">
		Offer Letter
	  </div>
	<?php } 
	else
		$step[] = "offer_letter:Get Offer Letter";
	
	if($row_query_student['medical']!=0) { $progress=$progress+5; 
	?>	
	  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:5%">
		Medical
	  </div>
	<?php }
	else
		$step[] = "medical:Medically Fit";
	
	if($row_query_student['payment1']!=0) { $progress=$progress+15; 
	?>	
	  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:15%">
		EMGS
	  </div>
	<?php } 
	else
		$step[] = "payment1:EMGS Payment";
	
	if($row_query_student['complete_app']!=0) { $progress=$progress+10; 
	?>	
	  <div class="progress-bar progress-bar-info" role="progressbar" style="width:10%;overflow:hidden">
		Final Application
	  </div>
	<?php } 
	else
		$step[] = "complete_app:Complete Application";
	
	if($row_query_student['VAL']!=0) { $progress=$progress+15; 
	?>	
	  <div class="progress-bar progress-bar-primary" role="progressbar" style="width:15%">
		VAL
	  </div>
	<?php } 
	else
		$step[] = "VAL:VAL Recieved";
	
	if($row_query_student['payment2']!=0) { $progress=$progress+15; 
	?>	
	  <div class="progress-bar progress-bar-warning" role="progressbar" style="width:15%">
		Tuition Fees
	  </div>
	<?php } 
	else
		$step[] = "payment2:Tuition Fees and Other Payment";
	
	if($row_query_student['send_sticker']!=0) { $progress=$progress+5; 
	?>	
	  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:5%">
		Send Sticker
	  </div>
	<?php } 
	else
		$step[] = "send_sticker: Send for Visa Sticker";
	
	if($row_query_student['rcv_sticker']!=0) { $progress=$progress+10; 
	?>	
	  <div class="progress-bar progress-bar-info" role="progressbar" style="width:10%">
		Rcv Sticker
	  </div>
	<?php } 
	else
		$step[] = "rcv_sticker: Recieved Visa Sticker";
	
	if($row_query_student['fly']!=0) { $progress=$progress+10; 
	?>	
	  <div class="progress-bar progress-bar-primary" role="progressbar" style="width:10%">
		Fly
	  </div>
	<?php 
	} 
	else
		$step[] = "fly:Fly";
	?>
	</div>
	

	
	<div style="width:<?php echo $progress; ?>%;border-top:1px solid #ff00d2; text-align:center">
	<?php
		echo $progress."%";
		if($progress==100 && isset($_GET['id']) && $row_query_student['completed']<>1)
		{			
			//close student after submitting file
			$update_student = "update student set completed = 1 WHERE id = ".$_GET['id'];
			mysqli_query($conn,$update_student);
			
			//auto comment student
			$query_comment = "INSERT INTO student_comments (comment, student_id, counselor_id) VALUES ('Successfully completed',".$student_id.",".$row_user['id'].")";
			$result_comment = mysqli_query($conn, $query_comment);
		}
	?>
	</div>

	<div class="row">
		<div class="col-md-6">
			<h3>GD No. - <?php if($row_query_student['gd_no']==NULL) echo "<button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#addGD'>Add GD No.</button>"; else echo $row_query_student['gd_no']; ?></h3>
			
			<h3><?php echo $row_query_student['name']; ?> (<?php if($row_query_student['passport']==NULL) echo "<button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#myModal'>Add Passport</button>"; else echo $row_query_student['passport']; ?>)</h3>
			
			<p><?php echo $row_query_student['university']; ?></p>
			<p>Program: <?php echo $row_query_student['program']; ?></p>
			<p>Subject: <?php echo $row_query_student['subject']; ?></p><br>
			<h4><u>Contact Details</u></h4>
			<p>Mobile1: <?php echo $row_query_student['mobile']; ?></p>
			<p>Mobile2: <?php echo $row_query_student['mobile2']; ?></p>
			<p>Email: <?php echo $row_query_student['email']; ?></p><br>
		</div>
		<div class="col-md-6">
			<h4><u>Application Process</u></h4>
			<ul>
			<?php if($row_query_student['application']!=0) echo "<li>Application Sent on ".$row_query_student['application']."</li>"; ?>
			<?php if($row_query_student['offer_letter']!=0) echo "<li>Offer Letter Recieved on ".$row_query_student['offer_letter']."</li>"; ?>
			<?php if($row_query_student['payment1']!=0) echo "<li>Emgs Payment on ".$row_query_student['payment1']."</li>"; ?>
			<?php if($row_query_student['medical']!=0) echo "<li>Medical checkup was done on ".$row_query_student['medical']." and proved as FIT</li>"; ?>
			<?php if($row_query_student['complete_app']!=0) echo "<li>Complete Application Sent on ".$row_query_student['complete_app']."</li>"; ?>
			<?php if($row_query_student['VAL']!=0) echo "<li>VAL received on ".$row_query_student['VAL']."</li>"; ?>
			<?php if($row_query_student['payment2']!=0) echo "<li>Tuition fees and other payment made on ".$row_query_student['payment2']."</li>"; ?>
			<?php if($row_query_student['send_sticker']!=0) echo "<li>Sent for visa sticker on ".$row_query_student['send_sticker']."</li>"; ?>
			<?php if($row_query_student['rcv_sticker']!=0) echo "<li>Passport received with visa sticker on ".$row_query_student['rcv_sticker']."</li>"; ?>
			<?php if($row_query_student['fly']!=0) echo "<li>The student flew to Malaysia on ".$row_query_student['fly']."</li>"; ?>
			</ul>
			<hr>
			<h4><u>Process to Complete</u></h4>
			<form method="post">
				<?php
					foreach($step as $steps):
						$split = explode(":",$steps);
				?>
					<div class="row">
						<div class="col-md-8">
							<div class="checkbox" id="steps">						
								<label style="font-size: 1.3em">
									<input type="checkbox" value="1" name="<?php echo $split[0]; ?>">
									<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
									<?php echo $split[1]; ?>
								</label>
							</div>
						</div>
						<div class="col-md-4" id="date_steps">
							<input type="text" name="date_<?php echo $split[0]; ?>" class="form-control input-sm date" placeholder="" style="margin-top:10px;" value="">
						</div>						
					</div>
					
				<?php						
					endforeach;
				?>
				<input type="submit" name="submit-steps" id="submit-steps" class="btn btn-primary">
			</form>
		</div>
	</div>
	<hr>
<?php
	$query_comments = "SELECT * FROM student_comments WHERE student_id=".$student_id;
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
	<button class="btn btn-primary" data-toggle="collapse" data-target="#comment-form" style="margin-bottom:20px">Add Comments</button>
	
	<form method="post" id="comment-form" class="collapse">
		<input type="hidden" name="counselor_id" value="<?php echo $row_user['id']; ?>">
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
				<input type="hidden" name="counselor_id" value="<?php echo $row_user['id']; ?>">
				<div class="form-group">
					<label>Comment <span class="compulsory">*</span></label>
					<textarea rows="3" class="form-control" name="comment" placeholder="Why do you want to close this file?" data-validation="required"></textarea>
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

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php'); ?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Add Passport</h4>
		</div>
		<form method="post" action="">
			<div class="modal-body">        
				<input type="text" name="passport" class="form-control" placeholder="Enter Passport No.">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="submit" name="submit-passport" class="btn btn-primary">Save changes</button>
			</div>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="addGD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add GD No.</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="">
			<input type="text" name="gd_no" class="form-control" placeholder="Enter GD No.">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="submit-GD" class="btn btn-primary">Save changes</button>
		</form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="retrieve-file" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<form role="form" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel">Retrieve from Archive</h4>
			</div>
			<div class="modal-body">	
				<input type="hidden" name="counselor_id" value="<?php echo $row_user['id']; ?>">
				<div class="form-group">
					<label>Comment</label>
					<textarea rows="3" class="form-control" name="comment" placeholder="Why do you want to retrieve this student?"></textarea>
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
<script>
// A $( document ).ready() block.
$( document ).ready(function() {

	$( '.date' ).hide();
	$( '#submit-steps' ).hide();

	$( "[name='application']" ).on( "change", function() {

		$( "[name='date_application']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='offer_letter']" ).on( "change", function() {

		$( "[name='date_offer_letter']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='medical']" ).on( "change", function() {

		$( "[name='date_medical']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='payment1']" ).on( "change", function() {

		$( "[name='date_payment1']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='complete_app']" ).on( "change", function() {

		$( "[name='date_complete_app']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='VAL']" ).on( "change", function() {

		$( "[name='date_VAL']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='payment2']" ).on( "change", function() {

		$( "[name='date_payment2']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='send_sticker']" ).on( "change", function() {

		$( "[name='date_send_sticker']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='rcv_sticker']" ).on( "change", function() {

		$( "[name='date_rcv_sticker']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
	$( "[name='fly']" ).on( "change", function() {

		$( "[name='date_fly']" ).toggle(300);
		$( '#submit-steps' ).show(300);
	});
});
</script>

<!-- Calendar script -->
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<script type="text/javascript">
$('.date').daterangepicker({
	singleDatePicker: true,
	locale: {
		  format: 'YYYY-MM-DD'
		},
});
</script>