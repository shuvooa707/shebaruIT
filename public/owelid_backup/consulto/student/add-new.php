<?php
/*
#Assessment
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/db_conn.php'); ?>
<?php
if (isset($_POST['submit'])){
	$office = stripslashes($_REQUEST['office']);
	$office = mysqli_real_escape_string($conn,$office);	
	$formno = stripslashes($_REQUEST['formno']);
	$formno = mysqli_real_escape_string($conn,$formno);	
	$counselor = stripslashes($_REQUEST['counselor']);
	$counselor = mysqli_real_escape_string($conn,$counselor);
	$date = stripslashes($_REQUEST['date']);
	$date = mysqli_real_escape_string($conn,$date);
	$student = stripslashes($_REQUEST['student']);
	$student = mysqli_real_escape_string($conn,$student);
	$fatherName = stripslashes($_REQUEST['fatherName']);
	$fatherName = mysqli_real_escape_string($conn,$fatherName);
	$dob = stripslashes($_REQUEST['dob']);
	$dob = mysqli_real_escape_string($conn,$dob);
	$program = stripslashes($_REQUEST['program']);
	$program = mysqli_real_escape_string($conn,$program);
	$subject = stripslashes($_REQUEST['subject']);
	$subject = mysqli_real_escape_string($conn,$subject);
	$english = stripslashes($_REQUEST['english']);
	$english = mysqli_real_escape_string($conn,$english);
	$score = stripslashes($_REQUEST['score']);
	$score = mysqli_real_escape_string($conn,$score);
	$job = stripslashes($_REQUEST['job']);
	$job = mysqli_real_escape_string($conn,$job);
	$passport = $_REQUEST['passport'];
	
	if(isset($_REQUEST['know_us']))
	{
		$know_us = implode(",",$_REQUEST['know_us']);
	}
	else
		$know_us = "";
	
	if(isset($_REQUEST['certificate']))
	{
		$certificate = implode(",",$_REQUEST['certificate']);
	}
	else
		$certificate = "";
	
	if(isset($_REQUEST['year']))
	{
		$year = implode(",",$_REQUEST['year']);
	}
	else
		$year = "";
	
	if(isset($_REQUEST['cgpa']))
	{
		$cgpa = implode(",",$_REQUEST['cgpa']);
	}
	else
		$cgpa = "";
	
	if(isset($_REQUEST['group']))
	{
		$group = implode(",",$_REQUEST['group']);
	}
	else
		$group = "";
	
	if(isset($_REQUEST['board']))
	{
		$board = implode(",",$_REQUEST['board']);
	}
	else
		$board = "";
	
	$mobile = stripslashes($_REQUEST['mobile']);
	$mobile = mysqli_real_escape_string($conn,$mobile);
	$mobile2 = stripslashes($_REQUEST['mobile2']);
	$mobile2 = mysqli_real_escape_string($conn,$mobile2);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn,$email);
	$address = stripslashes($_REQUEST['address']);
	$address = mysqli_real_escape_string($conn,$address);
	

	//Checking is user existing in the database or not
    $query_assessment = "INSERT INTO assessment(office, form_no, date, name, father_name, dob, program, subject, certificate, year, cgpa, study_group, board, english, score, passport, job_exp, know_us, phone1, phone2, email, address, counselor_id) VALUES ('$office', $formno, '$date', '$student', '$fatherName', '$dob', '$program', '$subject', '$certificate', '$year', '$cgpa', '$group', '$board', '$english', '$score', '$passport', '$job', '$know_us', '$mobile', '$mobile2', '$email', '$address', $counselor)";
 
	 if(mysqli_query($conn,$query_assessment))
	{
		header("Location: add-new.php?success=1&fn=$formno");
	}
	else
	{
		header("Location: add-new.php?error=".mysqli_error($conn));
	}
}

$query_counselor = "SELECT * FROM user ORDER BY e_id";
$result_query_counselor = mysqli_query($conn, $query_counselor);
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>
<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Assessment Form</h1>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
		
	
	<?php
	echo "<div style='margin-top:20px'>";

	if(isset($_GET['success']))
		echo "<div class='alert alert-success'>Success!</div>";
	if(isset($_GET['error']))
	{
		echo "<div class='alert alert-danger'>Something was seriously wrong. Please try again.<br>";	
		echo "Error: " . $_GET['error']."</div>";
	}
	echo "</div>";
	?>
	
<?php
if(isset($_GET['fn'])){
	$query_assessment = "SELECT * FROM assessment WHERE form_no=".$_GET['fn'];
	$result_query_assessment = mysqli_query($conn, $query_assessment);
	$row_query_assessment = mysqli_fetch_assoc($result_query_assessment);
	
	$query_counselor = "SELECT * FROM user WHERE id=".$row_query_assessment['counselor_id'];
	$result_query_counselor = mysqli_query($conn, $query_counselor);
	$row_query_counselor = mysqli_fetch_assoc($result_query_counselor);

?>
	<a href="add-new.php"><button class="btn btn-primary" ><i class="fa fa-plus fa-fw"></i> ADD</button></a>
	<a href="edit.php?id=<?php echo $row_query_counselor['id']; ?>"><button class="btn btn-info" ><i class="fa fa-pencil fa-fw"></i> EDIT</button></a>
	<a href="#"><button class="btn btn-danger" ><i class="fa fa-remove  fa-fw"></i> DELETE</button></a>
	<hr>
	
    <div class="row">
		<div class="col-md-4"><h3>#<?php echo $row_query_assessment['form_no']; ?></h3></div>
		<div class="col-md-4"><h3><?php echo $row_query_counselor['name']; ?></h3></div>
		<div class="col-md-4"><h3><?php echo $row_query_assessment['date']; ?></h3></div>
		<div class="col-md-4" style="margin-top:20px">
			<p><strong>Name:</strong> <?php echo $row_query_assessment['name']; ?> <br></p>
			<p><strong>Father's Name:</strong> <?php echo $row_query_assessment['father_name']; ?><br></p>
			<p><strong>Date of Birth:</strong> <?php echo $row_query_assessment['dob']; ?> <br></p>
			<p><strong>Program:</strong> <?php echo $row_query_assessment['program']; ?> <br></p>
			<p><strong>Subject:</strong> <?php echo $row_query_assessment['subject']; ?> <br></p>
		</div>
		<div class="col-md-4" style="margin-top:20px">
			<p><strong>English:</strong> <?php echo $row_query_assessment['english']; ?> <br></p>		
			<p><strong>Score:</strong> <?php echo $row_query_assessment['score']; ?><br></p>
			<p><strong>Passport:</strong> <?php if($row_query_assessment['passport']==1) echo "Available"; else echo "Not available"; ?> <br></p>
			<p><strong>Job Experience:</strong> <?php echo $row_query_assessment['job_exp']; ?> <br></p>
			<p><strong>Know About Us:</strong> <?php echo $row_query_assessment['know_us']; ?> <br></p>
		</div>
		<div class="col-md-4" style="margin-top:20px">
			<p><strong>Contact 1:</strong> <?php echo $row_query_assessment['phone1']; ?> <br></p>
			<p><strong>Contact 2:</strong> <?php echo $row_query_assessment['phone2']; ?> <br></p>
			<p><strong>Email:</strong> <?php echo $row_query_assessment['email']; ?> <br></p>
			<p><strong>Address:</strong> <?php echo $row_query_assessment['address']; ?> <br></p>
		</div>
    </div><!--/row-->    
	<div class="row">
		<div class="col-md-2">
			<h4>Certificate</h4>
			<?php 
			$cert_split = explode(',',$row_query_assessment['certificate']); 
			
			foreach($cert_split as $cert_element)
			{
				echo $cert_element . '<br>';	
			}
			?>
		</div>
		<div class="col-md-2">
			<h4>Passing Year</h4>
			<?php 
			$year_split = explode(',',$row_query_assessment['year']);
			
			foreach($year_split as $year_element)
			{
				echo $year_element . '<br>';	
			}
			?>
		</div>
		<div class="col-md-2">
			<h4>CGPA/Division</h4>
			<?php 
			$cgpa_split = explode(',',$row_query_assessment['cgpa']);
			
			foreach($cgpa_split as $cgpa_element)
			{
				echo $cgpa_element . '<br>';	
			}
			?>
		</div>
		<div class="col-md-2">
			<h4>Study Group</h4>
			<?php 
			$study_group_split = explode(',',$row_query_assessment['study_group']);
			
			foreach($study_group_split as $study_group_element)
			{
				echo $study_group_element . '<br>';	
			}
			?>
		</div>
		<div class="col-md-3">
			<h4>Board</h4>
			<?php 
			$board_split = explode(',',$row_query_assessment['board']);
			
			foreach($board_split as $board_element)
			{
				echo $board_element . '<br>';	
			}
			?>
		</div>
	</div>
<?php 
}
else { ?>



	<div style="padding-bottom:20px" class="text-info">
		<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
	</div>
	



<form id="signupform" role="form" method="post"> 

	<div class="row">
		<div class="col-lg-3">
			<div class="form-group">
				<label>Office <span class="compulsory">*</span></label>
				<select class="form-control" name="office" data-validation="required">
					<option value=""></option>
					<option value="Dhaka" <?php if($row_user['office']=='Dhaka') echo "selected"; ?>>Dhaka Office</option>
					<option value="Chittagong"<?php if($row_user['office']=='Chittagong') echo "selected"; ?>>Chittagong Office</option>
					<option value="Jessore"<?php if($row_user['office']=='Jessore') echo "selected"; ?>>Jessore Office</option>
				</select>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label>Form No <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="formno" placeholder="XXXX" data-validation="required">
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label>Counselor <span class="compulsory">*</span></label>
				<select class="form-control" name="counselor">
					<option value="0">Direct</option>
					<?php								
					// output data of each row
					while($row_query_counselor = mysqli_fetch_assoc($result_query_counselor)) {
					?> 
					<option value="<?php echo $row_query_counselor['id']; ?>"><?php echo $row_query_counselor['name']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="form-group">
				<label>Date <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="date" placeholder="YYYY-MM-DD" value="<?php echo date("Y-m-d"); ?>" data-validation="required">
			</div>
		</div>
	</div>	

	<fieldset>
		<legend>Student Information</legend>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Student's Name <span class="compulsory">*</span></label>
					<input class="form-control" type="text" name="student" placeholder="Please type the student's name" data-validation="required">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Father's Name</label>
					<input class="form-control" type="text" name="fatherName" placeholder="Please type the father's name">
				</div>
			</div>					
		</div>
		
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Date of Birth</label>
					<input class="form-control" type="text" name="dob" placeholder="YYYY-MM-DD">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Program of Study</label>
					<select class="form-control" name="program">
						<option value=""></option>
						<option value="A-Level">A-Level</option>
						<option value="Foundation">Foundation</option>
						<option value="Diploma">Diploma</option>
						<option value="Bachelor">Bachelor</option>
						<option value="Masters">Masters</option>
						<option value="Ph.D">Ph.D</option>
					</select>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Subject of Study</label>
					<input class="form-control" type="text" name="subject" placeholder="Subject of Study">
				</div>
			</div>
		</div>			
	</fieldset>
	
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
	<script type="text/javascript" src="/admin/js/script.js"></script>
	
	<fieldset>
		<legend>Academic Result</legend>
		<div class="row" ng-app="shanidkvApp">				
			<div ng-app="angularjs-starter" ng-controller="MainCtrl">
				<div  data-ng-repeat="choice in choices">						
					<div class="col-lg-2">
						<div class="form-group">
							<label>Certificate</label>
							<input class="form-control" type="text" name="certificate[]">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Passing Year</label>
							<input class="form-control" type="text" name="year[]">
						</div>
					</div>				
					<div class="col-lg-2">
						<div class="form-group">
							<label>CGPA/Class</label>
							<input class="form-control" type="text" name="cgpa[]">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="form-group">
							<label>Group</label>
							<input class="form-control" type="text" name="group[]">
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<label>Board / Institution Name</label>
							<input class="form-control" type="text" name="board[]">
						</div>
					</div>
					<div class="col-lg-1">
						<div class="form-group">
							<button class="btn btn-danger btn-sm" style="margin-top:25px;" ng-hide="$first" ng-show="$last" ng-click="removeChoice()"><i class="fa fa-close"></i></button>
						</div>
					</div>				      
				</div>
				<div class="col-lg-12">
					<div class="form-group">
						<button class="btn btn-primary btn-sm" ng-click="addNewChoice()"><i class="fa fa-plus"></i> ADD MORE</button>
					</div>
				</div>	   
			   
			</div>
		</div>
	</fieldset>	
	
	<fieldset>
		<legend>Other Information</legend>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>English Proficiency</label>
					<select class="form-control" name="english" id="englishSelector">
						<option value=""></option>
						<option value="IELTS">IELTS</option>
						<option value="TOFEL">TOFEL</option>
						<option value="SAT">SAT</option>
						<option value="GMAT">GMAT</option>
						<option value="GRE">GRE</option>
					</select>							
				</div>
			</div>
			<div class="col-lg-4" id="score">
				<div class="form-group">
					<label>Score</label>
					<input class="form-control" type="text" name="score" placeholder="What is the score?">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Job Experience</label>
					<input class="form-control" type="text" name="job" placeholder="How many years? Leave it empty if NO">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">						
				<div class="form-group">
					<label>Passport: </label>
					<label class="radio-inline">
						<input name="passport" value="1" type="radio">Yes
					</label>
					<label class="radio-inline">
						<input name="passport" value="0" type="radio" checked>No
					</label>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="form-group">
					<label>Know About Us: </label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Newspaper">Newspaper
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Web">Web
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Friend">Friend
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Poster/Leaflet">Poster/Leaflet
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Festoon/Banner">Festoon/Banner
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Facebook">Facebook
					</label>
				</div>
			</div>
		</div>			
	</fieldset>
	<fieldset class="form-group">
		<legend>Contact Info</legend>
		<div class="row">	
			<div class="col-lg-4 form-group">
				<label>Mobile No. <span class="compulsory">*</span></label>
				<input class="form-control" name="mobile" placeholder="01XXXXXXXXX" type="text" data-validation="number">
			</div>
			<div class="col-lg-4 form-group">
				<label>Alternative Contact</label>
				<input class="form-control" name="mobile2" placeholder="01XXXXXXXXX" type="text">
			</div>
			<div class="col-lg-4 form-group">
				<label>Email Address</label>
				<input class="form-control" name="email" placeholder="someone@email.com" type="text">
			</div>
		</div>			
			
		<div class="form-group">
			<label>Address</label>
			<input class="form-control" name="address" placeholder="Present Address" type="text">
		</div>					
		
	</fieldset>
	<button type="submit" name="submit" class="btn btn-primary" style="margin-top:20px;width:100%"><i class="fa fa-save"></i> Submit</button>
</form>

<?php } ?>
</div>

        <!-- /#page-wrapper -->
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php'); ?>
<script>
$(function() {
	$('#score').hide();
  $('#englishSelector').change(function(){
    $('#score').show(300);
  });
});
</script>