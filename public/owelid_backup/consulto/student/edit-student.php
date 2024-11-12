<?php
/*
#student
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/header.php'); ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Edit Student Information</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	

<?php
//get university list
$query_university = "SELECT * FROM university ORDER BY name";
$result_query_university = mysqli_query($conn, $query_university);
$row_query_university = mysqli_fetch_assoc($result_query_university);


//process update
if (isset($_POST['submit'])){
	$student_id = stripslashes($_REQUEST['student_id']);
	$student_id = mysqli_real_escape_string($conn,$student_id);
	$date = stripslashes($_REQUEST['date']);
	$date = mysqli_real_escape_string($conn,$date);
	$student = stripslashes($_REQUEST['student']);
	$student = mysqli_real_escape_string($conn,$student);
	$passport = stripslashes($_REQUEST['passport']);
	$passport = mysqli_real_escape_string($conn,$_REQUEST['passport']);	
	$university = stripslashes($_REQUEST['university']);
	$university = mysqli_real_escape_string($conn,$university);
	$program = stripslashes($_REQUEST['program']);
	$program = mysqli_real_escape_string($conn,$program);
	$subject = stripslashes($_REQUEST['subject']);
	$subject = mysqli_real_escape_string($conn,$subject);
	$mobile = stripslashes($_REQUEST['mobile']);
	$mobile = mysqli_real_escape_string($conn,$mobile);
	$mobile2 = stripslashes($_REQUEST['mobile2']);
	$mobile2 = mysqli_real_escape_string($conn,$mobile2);
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($conn,$email);

	//Checking is user existing in the database or not
    $query_insert_student = "UPDATE student SET date='$date', name='$student', passport='$passport', university='$university', program='$program', subject='$subject', mobile='$mobile', mobile2='$mobile2', email='$email' WHERE id = ".$student_id;
 
	 if(mysqli_query($conn,$query_insert_student))
	{
		echo "<div class='alert alert-success'>Successfully Updated! <> <a href='view-student.php?id=$student_id'>VIEW DETAILS</a></div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>Error:". mysqli_error($conn)."</div>";
	}
}
?>
	
<?php
if(isset($_GET['id'])){
	$query_student = "SELECT * FROM student WHERE id=".$_GET['id'];
	$result_query_student = mysqli_query($conn, $query_student);
	$row_query_student = mysqli_fetch_assoc($result_query_student);


?>
	
	<div style="padding-bottom:20px" class="text-info">
		<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
	</div>
	
	<form class="form-horizontal" role="form" method="post">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<input type="hidden" name="student_id" value="<?php echo $row_query_student['id']; ?>">
				<div class="form-group">
					<label class="col-sm-4 control-label">Date <span class="compulsory">*</span></label>
					<div class="col-sm-8">
						<input class="form-control input-sm" type="text" name="date" placeholder="YYYY-MM-DD" value="<?php echo $row_query_student['date']; ?>" data-validation="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Student's Name <span class="compulsory">*</span></label>
					<div class="col-sm-8">
						<input class="form-control input-sm" type="text" name="student" placeholder="Please type the student's name" data-validation="required" value="<?php echo $row_query_student['name']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Passport No</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" type="text" name="passport" placeholder="Please type the passport no." value="<?php echo $row_query_student['passport']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">University</label>
					<div class="col-sm-8">
						<select class="form-control input-sm" name="university">
							<option value=""></option>
						<?php while($row_query_university = mysqli_fetch_assoc($result_query_university)){ ?>						
							<option value="<?php echo $row_query_university['name']; ?>" <?php if($row_query_student['university']==$row_query_university['name']) echo "selected"; ?> ><?php echo $row_query_university['name']; ?></option>						
						<?php }	?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Program of Study</label>
					<div class="col-sm-8">
						<select class="form-control input-sm" name="program">
							<option value=""></option>
							<option value="A-Level" <?php if($row_query_student['program']=="A-Level") echo "selected"; ?> >A-Level</option>
							<option value="Foundation" <?php if($row_query_student['program']=="Foundation") echo "selected"; ?> >Foundation</option>
							<option value="Diploma" <?php if($row_query_student['program']=="Diploma") echo "selected"; ?> >Diploma</option>
							<option value="Bachelor" <?php if($row_query_student['program']=="Bachelor") echo "selected"; ?> >Bachelor</option>
							<option value="Masters" <?php if($row_query_student['program']=="Masters") echo "selected"; ?> >Masters</option>
							<option value="Ph.D" <?php if($row_query_student['program']=="Ph.D") echo "selected"; ?> >Ph.D</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Subject of Study</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" type="text" name="subject" placeholder="Subject of Study" value="<?php echo $row_query_student['subject']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Mobile No. <span class="compulsory">*</span></label>
					<div class="col-sm-8">
						<input class="form-control input-sm" name="mobile" placeholder="01XXXXXXXXX" type="text" data-validation="number" value="<?php echo $row_query_student['mobile']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Alternative Contact</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" name="mobile2" placeholder="01XXXXXXXXX" type="text" value="<?php echo $row_query_student['mobile2']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Email Address</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" name="email" placeholder="someone@email.com" type="text" value="<?php echo $row_query_student['email']; ?>">
					</div>
				</div>				
				 <div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button type="submit" name="submit" class="btn btn-primary" style="margin-top:20px;"><i class="fa fa-save"></i> Submit</button>
					</div>
				</div>
			</div>
		</div>
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