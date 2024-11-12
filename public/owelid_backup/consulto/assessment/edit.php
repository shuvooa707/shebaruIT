<?php
/*
#Assessment
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Edit Assessment Form</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	

<?php
//process update
if (isset($_POST['submit'])){
	$id = stripslashes($_REQUEST['id']);
	$id = mysqli_real_escape_string($conn,$id);
	$formno = stripslashes($_REQUEST['formno']);
	$formno = mysqli_real_escape_string($conn,$formno);
	
	if(isset($_REQUEST['counselor']))
	{
	$counselor = stripslashes($_REQUEST['counselor']);
	$counselor = mysqli_real_escape_string($conn,$counselor);
	}
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
	//delete the row if it fully empty
	for($i=0;$i<sizeof($_REQUEST['certificate']);$i++)
	{
		if($_REQUEST['certificate'][$i]=="" && $_REQUEST['year'][$i]=="" && $_REQUEST['cgpa'][$i]=="" && $_REQUEST['group'][$i]=="" && $_REQUEST['board'][$i]==""){
			unset($_REQUEST['certificate'][$i]);
			unset($_REQUEST['year'][$i]);
			unset($_REQUEST['cgpa'][$i]);
			unset($_REQUEST['group'][$i]);
			unset($_REQUEST['board'][$i]);
		}
	}
	
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
	if(isset($_REQUEST['counselor']))
		$conscond=",counselor_id=$counselor";
	else
		$conscond="";

	//Checking is user existing in the database or not
    $query_update_assessment = "UPDATE assessment SET form_no=$formno, date='$date', name='$student', father_name='$fatherName', dob='$dob', program='$program', subject='$subject', certificate='$certificate', year='$year', cgpa='$cgpa', study_group='$group', board='$board', english='$english', score='$score', passport='$passport', job_exp='$job', know_us='$know_us', phone1='$mobile', phone2='$mobile2', email='$email', address='$address' ".$conscond." WHERE id=$id";
 
	 if(mysqli_query($conn,$query_update_assessment))
	{
		echo "<div class='alert alert-success'>Successfully updated! <a href='view-assessment.php?id=$id'>View Assessment</a></div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>Error:". mysqli_error($conn)."</div>";
	}
}
?>
	
<?php
if(isset($_GET['id'])){
	$query_assessment = "SELECT * FROM assessment WHERE id=".$_GET['id'];
	$result_query_assessment = mysqli_query($conn, $query_assessment);
	$row_query_assessment = mysqli_fetch_assoc($result_query_assessment);
	
	$query_counselor = "SELECT * FROM user WHERE id=".$row_query_assessment['counselor_id'];
	$result_query_counselor = mysqli_query($conn, $query_counselor);
	$row_query_counselor = mysqli_fetch_assoc($result_query_counselor);
	
	$query_counselor_all = "SELECT * FROM user";
	$result_query_counselor_all = mysqli_query($conn, $query_counselor_all);


?>
	
	<div style="padding-bottom:20px" class="text-info">
		<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
	</div>
	
	<form id="signupform" role="form" method="post"> 
	<input type="hidden" name="id" value="<?php echo $row_query_assessment['id']; ?>">
	<div class="row">
		<div class="col-lg-4">
			<div class="form-group">
				<label>Form No <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="formno" placeholder="XXXX" data-validation="required" value="<?php echo $row_query_assessment['form_no']; ?>">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Counselor <span class="compulsory">*</span></label>
				<select class="form-control" name="counselor" <?php if($row_user['usergroup'] != 'admin') echo 'disabled'; ?>>
					<option value="0">Direct</option>
					<?php								
					// output data of each row
					while($row_query_counselor_all = mysqli_fetch_assoc($result_query_counselor_all)) {
					?> 
					<option value="<?php echo $row_query_counselor_all['id']; ?>" <?php if($row_query_counselor_all['id']==$row_query_counselor['id']) echo "selected"; ?>><?php echo $row_query_counselor_all['name']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Date <span class="compulsory">*</span></label>
				<input class="form-control" type="text" name="date" placeholder="YYYY-MM-DD" value="<?php echo $row_query_assessment['date']; ?>" data-validation="required">
			</div>
		</div>
	</div>	

	<fieldset>
		<legend>Student Information</legend>
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label>Student's Name <span class="compulsory">*</span></label>
					<input class="form-control" type="text" name="student" placeholder="Please type the student's name" data-validation="required" value="<?php echo $row_query_assessment['name']; ?>">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label>Father's Name</label>
					<input class="form-control" type="text" name="fatherName" placeholder="Please type the father's name" value="<?php echo $row_query_assessment['father_name']; ?>">
				</div>
			</div>					
		</div>
		
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label>Date of Birth</label>
					<input class="form-control" type="text" name="dob" placeholder="YYYY-MM-DD" value="<?php echo $row_query_assessment['dob']; ?>">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Program of Study</label>
					<select class="form-control" name="program">
						<option value=""></option>
						<option value="A-Level" <?php if($row_query_assessment['program']=="A-Level") echo "selected"; ?> >A-Level</option>
						<option value="Foundation" <?php if($row_query_assessment['program']=="Foundation") echo "selected"; ?> >Foundation</option>
						<option value="Diploma" <?php if($row_query_assessment['program']=="Diploma") echo "selected"; ?> >Diploma</option>
						<option value="Bachelor" <?php if($row_query_assessment['program']=="Bachelor") echo "selected"; ?> >Bachelor</option>
						<option value="Masters" <?php if($row_query_assessment['program']=="Masters") echo "selected"; ?> >Masters</option>
						<option value="Ph.D" <?php if($row_query_assessment['program']=="Ph.D") echo "selected"; ?> >Ph.D</option>
					</select>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Subject of Study</label>
					<input class="form-control" type="text" name="subject" placeholder="Subject of Study" value="<?php echo $row_query_assessment['subject']; ?>">
				</div>
			</div>
		</div>			
	</fieldset>
	
	<?php 
	$certificate = explode(",",$row_query_assessment['certificate']);
	$year = explode(",",$row_query_assessment['year']);
	$cgpa = explode(",",$row_query_assessment['cgpa']);
	$group = explode(",",$row_query_assessment['study_group']);
	$board = explode(",",$row_query_assessment['board']);
	?>

	<fieldset>
		<legend>Academic Result</legend>

		<?php for($x=0;$x<sizeof($certificate);$x++) { ?>
		<div class="row">									
			<div class="col-lg-2 col-sm-6 col-xs-6">
				<div class="form-group">
					<label>Certificate</label>
					<input class="form-control" type="text" name="certificate[]" value="<?php echo $certificate[$x]; ?>">
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-xs-6">
				<div class="form-group">
					<label>Passing Year</label>
					<input class="form-control" type="text" name="year[]" value="<?php echo $year[$x]; ?>">
				</div>
			</div>				
			<div class="col-lg-2 col-sm-6 col-xs-6">
				<div class="form-group">
					<label>CGPA/Class</label>
					<input class="form-control" type="text" name="cgpa[]" value="<?php echo $cgpa[$x]; ?>">
				</div>
			</div>
			<div class="col-lg-2 col-sm-6 col-xs-6">
				<div class="form-group">
					<label>Group</label>
					<input class="form-control" type="text" name="group[]" value="<?php echo $group[$x]; ?>">
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-xs-6">
				<div class="form-group">
					<label>Board / Institution Name</label>
					<input class="form-control" type="text" name="board[]" value="<?php echo $board[$x]; ?>">
				</div>
			</div>			
		</div>
		<div class="visible-sm visible-xs"><hr></div>
		<?php } ?>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.25/angular.min.js"></script>
		<script type="text/javascript" src="/admin/js/script.js"></script>
		<div ng-app="shanidkvApp">				
			<div ng-app="angularjs-starter" ng-controller="MainCtrl">
				<div  data-ng-repeat="choice in choices">
					<div class="row">									
						<div class="col-lg-2 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>Certificate</label>
								<input class="form-control" type="text" name="certificate[]">
							</div>
						</div>
						<div class="col-lg-2 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>Passing Year</label>
								<input class="form-control" type="text" name="year[]">
							</div>
						</div>				
						<div class="col-lg-2 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>CGPA/Class</label>
								<input class="form-control" type="text" name="cgpa[]">
							</div>
						</div>
						<div class="col-lg-2 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>Group</label>
								<input class="form-control" type="text" name="group[]">
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-xs-6">
							<div class="form-group">
								<label>Board / Institution Name</label>
								<input class="form-control" type="text" name="board[]">
							</div>
						</div>	
						<div class="col-lg-1 col-sm-9 col-xs-9">
							<div class="form-group">
								<button class="btn btn-danger btn-sm" style="margin-top:25px;" ng-show="$last" ng-click="removeChoice()"><i class="fa fa-close"></i></button>
							</div>
						</div>
					</div>
					<div class="visible-sm visible-xs"><hr></div>
				</div>				
				<div class="form-group">
					<button type="button" class="btn btn-primary btn-sm" ng-click="addNewChoice()"><i class="fa fa-plus"></i> ADD MORE</button>
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
						<option value="IELTS" <?php if($row_query_assessment['english']=="IELTS") echo "selected"; ?> >IELTS</option>
						<option value="TOFEL" <?php if($row_query_assessment['english']=="TOFEL") echo "selected"; ?> >TOFEL</option>
						<option value="SAT" <?php if($row_query_assessment['english']=="SAT") echo "selected"; ?> >SAT</option>
						<option value="GMAT" <?php if($row_query_assessment['english']=="GMAT") echo "selected"; ?> >GMAT</option>
						<option value="GRE" <?php if($row_query_assessment['english']=="GRE") echo "selected"; ?> >GRE</option>
					</select>							
				</div>
			</div>
			<div class="col-lg-4" id="score">
				<div class="form-group">
					<label>Score</label>
					<input class="form-control" type="text" name="score" placeholder="What is the score?" value="<?php echo $row_query_assessment['score']; ?>">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>Job Experience</label>
					<input class="form-control" type="text" name="job" placeholder="How many years? Leave it empty if NO" value="<?php echo $row_query_assessment['job_exp']; ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3">						
				<div class="form-group">
					<label>Passport: </label>
					<label class="radio-inline">
						<input name="passport" value="1" type="radio"  <?php if($row_query_assessment['passport']==1) echo "checked"; ?> >Yes
					</label>
					<label class="radio-inline">
						<input name="passport" value="0" type="radio"  <?php if($row_query_assessment['passport']==0) echo "checked"; ?> >No
					</label>
				</div>
			</div>
			
			<?php $know_us = explode(",",$row_query_assessment['know_us']); ?>
			
			<div class="col-lg-9">
				<div class="form-group">
					<label>Know About Us: </label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Newspaper" <?php if(in_array('Newspaper',$know_us)) echo "checked"; ?> >Newspaper
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Web" <?php if(in_array('Web',$know_us)) echo "checked"; ?> >Web
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Friend" <?php if(in_array('Friend',$know_us)) echo "checked"; ?> >Friend
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Poster/Leaflet" <?php if(in_array('Poster/Leaflet',$know_us)) echo "checked"; ?> >Poster/Leaflet
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Festoon/Banner" <?php if(in_array('Festoon/Banner',$know_us)) echo "checked"; ?> >Festoon/Banner
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="know_us[]" value="Facebook" <?php if(in_array('Facebook',$know_us)) echo "checked"; ?> >Facebook
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
				<input class="form-control" name="mobile" placeholder="01XXXXXXXXX" type="text" data-validation="number" value="<?php echo $row_query_assessment['phone1']; ?>">
			</div>
			<div class="col-lg-4 form-group">
				<label>Alternative Contact</label>
				<input class="form-control" name="mobile2" placeholder="01XXXXXXXXX" type="text" value="<?php echo $row_query_assessment['phone2']; ?>">
			</div>
			<div class="col-lg-4 form-group">
				<label>Email Address</label>
				<input class="form-control" name="email" placeholder="someone@email.com" type="text" value="<?php echo $row_query_assessment['email']; ?>">
			</div>
		</div>			
			
		<div class="form-group">
			<label>Address</label>
			<input class="form-control" name="address" placeholder="Present Address" type="text" value="<?php echo $row_query_assessment['address']; ?>">
		</div>					
		
	</fieldset>
	<button type="submit" name="submit" class="btn btn-primary" style="margin-top:20px;width:100%"><i class="fa fa-save"></i> Submit</button>
</form>
	
<?php 
}
else
{
?>
<div class="search-box">
<label>Search by Form No.</label>
<input id="byFormno" type="text" autocomplete="off" class="form-control" placeholder="Enter form no." />
<div class="result"></div>
</div>
<?php } ?>
</div>
<!-- /#page-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/footer.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box #byFormno').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("backend-search.php", {queryFormno: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>