<?php
/*
#edit course
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Edit Course Information</h3>
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="/bmscl">Home</a></li>
			  <li class="breadcrumb-item"><a href="/bmscl/search">Search Course</a></li>
			  <li class="breadcrumb-item active">Edit Course</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	

<?php
//process update
if (isset($_POST['submit'])){
	$course_id = stripslashes($_REQUEST['course_id']);
	$course_id = mysqli_real_escape_string($conn,$course_id);
	$course = stripslashes($_REQUEST['course']);
	$course = mysqli_real_escape_string($conn,$course);
	$program = stripslashes($_REQUEST['program']);
	$program = mysqli_real_escape_string($conn,$program);
	$program = ucfirst($program);
	$duration = stripslashes($_REQUEST['duration']);
	$duration = mysqli_real_escape_string($conn,$duration);
	$nos = stripslashes($_REQUEST['nos']);
	$nos = mysqli_real_escape_string($conn,$nos);
	$emgs = stripslashes($_REQUEST['emgs']);
	$emgs = mysqli_real_escape_string($conn,$emgs);
	$misc = stripslashes($_REQUEST['misc']);
	$misc = mysqli_real_escape_string($conn,$misc);
	$ttf = stripslashes($_REQUEST['ttf']);
	$ttf = mysqli_real_escape_string($conn,$ttf);
	$grand_total = stripslashes($_REQUEST['grand_total']);
	$grand_total = mysqli_real_escape_string($conn,$grand_total);
	$intake = stripslashes($_REQUEST['intake']);
	$intake = mysqli_real_escape_string($conn,$intake);
	$description = stripslashes($_REQUEST['description']);
	$description = mysqli_real_escape_string($conn,$description);
	$remarks = stripslashes($_REQUEST['remarks']);
	$remarks = mysqli_real_escape_string($conn,$remarks);
	$discount = stripslashes($_REQUEST['discount']);
	$discount = mysqli_real_escape_string($conn,$discount);

	//Checking is user existing in the database or not
    $query_update_course = "UPDATE course SET course='$course', program='$program', duration='$duration', nos='$nos', emgs='$emgs', misc='$misc', ttf='$ttf', grand_total='$grand_total', intake='$intake', description='$description', remarks='$remarks', discount='$discount', updated_by=".$row_user['id']." WHERE id = ".$course_id;
 
	 if(mysqli_query($conn,$query_update_course))
	{
		echo "<div class='alert alert-success'>Successfully Updated! <> <a href='course_details.php?id=$course_id'>VIEW DETAILS</a></div>";
	}
	else
	{
		echo "<div class='alert alert-danger'>Error:". mysqli_error($conn)."</div>";
	}
}
if (isset($_POST['submit-info'])){
	$id = $_POST['ci_id'];
	$c_key = $_POST['c_key'];
	$c_value = $_POST['c_value'];
	for($i=0;$i<sizeof($id);$i++){
		$update_course_info = "UPDATE course_info SET c_key='$c_key[$i]', c_value='$c_value[$i]' WHERE id = ".$id[$i];
		mysqli_query($conn,$update_course_info);
	}

}
?>
	
<?php
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$query_course = "SELECT * FROM course WHERE id=".$id;
	$result_course = mysqli_query($conn, $query_course);
	$row_course = mysqli_fetch_assoc($result_course);

	$query_course_info = "SELECT * FROM course_info WHERE c_id=".$id;
	$result_course_info = mysqli_query($conn, $query_course_info);

?>
	
	<div style="padding-bottom:20px" class="text-info">
		<span class="compulsory">*</span> <i>Denotes compulsory fields.</i>
	</div>
	
	<form class="form-horizontal" role="form" method="post">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<input type="hidden" name="course_id" value="<?php echo $row_course['id']; ?>">
				<div class="form-group">
					<label class="col-sm-4 control-label">Course Title<span class="compulsory">*</span></label>
					<div class="col-sm-8">
						<input class="form-control input-sm" type="text" name="course" placeholder="Please type the course title" value="<?php echo $row_course['course']; ?>" data-validation="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Program</label>
					<div class="col-sm-8">
						<select name="program" class="form-control input-sm">
							<option value="">All Levels</option>
							<option value="PhD" <?php if($row_course['program']=="PhD")echo "selected"; ?> >PhD</option>
							<option value="masters" <?php if($row_course['program']=="masters")echo "selected"; ?> >Masters</option>
							<option value="bachelor" <?php if(strtolower($row_course['program'])=="bachelor")echo "selected"; ?> >Bachelor</option>
							<option value="diploma" <?php if($row_course['program']=="diploma")echo "selected"; ?> >Diploma</option>
							<option value="foundation" <?php if(strtolower($row_course['program'])=="foundation") echo "selected"; ?> >Foundation</option>
							<option value="pre-university" <?php if($row_course['program']=="pre-university")echo "selected"; ?>>Pre-University</option>
							<option value="professional" <?php if($row_course['program']=="professional")echo "selected"; ?> >Professional</option>
							<option value="certificate" <?php if($row_course['program']=="certificate")echo "selected"; ?> >Certificate</option>
							<option value="language" <?php if($row_course['program']=="language")echo "selected"; ?> >Language</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Duration</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" type="text" name="duration" placeholder="Duration" value="<?php echo $row_course['duration']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">No. of Semester</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" type="text" name="nos" placeholder="No. of Semester" value="<?php echo $row_course['nos']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">EMGS</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">RM</span>
							<input class="form-control input-sm" type="text" name="emgs" placeholder="EMGS Fees" value="<?php echo $row_course['emgs']; ?>">
						</div>
					</div>
				</div>				
				<div class="form-group">
					<label class="col-sm-4 control-label">Miscellaneous</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">RM</span>
							<input class="form-control input-sm" type="text" name="misc" placeholder="Miscellaneous Fees" value="<?php echo $row_course['misc']; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Total Tuition Fees</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">RM</span>
							<input class="form-control input-sm" name="ttf" placeholder="Total Tuition Fees" type="text" value="<?php echo $row_course['ttf']; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Grand Total</label>
					<div class="col-sm-8">
						<div class="input-group">
							<span class="input-group-addon">RM</span>
							<input class="form-control input-sm" name="grand_total" placeholder="Grand Total" type="text" value="<?php echo $row_course['grand_total']; ?>">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Intakes</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" name="intake" placeholder="Intakes" type="text" value="<?php echo $row_course['intake']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Description</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" name="description" placeholder="Description" type="text" value="<?php echo $row_course['description']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Remarks</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" name="remarks" placeholder="Remarks" type="text" value="<?php echo $row_course['remarks']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label">Discount</label>
					<div class="col-sm-8">
						<input class="form-control input-sm" name="discount" placeholder="Discount" type="text" value="<?php echo $row_course['discount']; ?>">
					</div>
				</div>				
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
						<button type="submit" name="submit" class="btn btn-primary" style="margin-top:20px;"><i class="fa fa-save"></i> Save</button> <a href="course_details.php?id=<?php echo $row_course['id']; ?>" class="btn btn-default" style="margin-top:20px;"><i class="fa fa-times"></i> Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</form>
	<br>

	<?php if(mysqli_num_rows($result_course_info)>0) { ?>
	<h3>Fees Breakdown</h3>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<form class="form-horizontal" role="form" method="post">
				<?php
				$i=0;
				while($row_course_info = mysqli_fetch_assoc($result_course_info))
				{
				?>
				<input type="hidden" name="ci_id[]" value="<?php echo $row_course_info['id']; ?>">			
				<div class="form-group">
					<div class="col-sm-6">
						<input class="form-control input-sm" type="text" name="c_key[]" placeholder="c_key" value="<?php echo $row_course_info['c_key']; ?>">
					</div>
					<div class="col-sm-6">
						<input class="form-control input-sm" type="text" name="c_value[<?php echo $i; ?>]" placeholder="c_value" value="<?php echo $row_course_info['c_value']; ?>">
					</div>
				</div>
				<?php
				$i++;
				}
				?>
				<div class="form-group">
					<div class="col-sm-8">
						<button type="submit" name="submit-info" class="btn btn-primary" style="margin-top:20px;"><i class="fa fa-save"></i> Save</button> 
						<a href="course_details.php?id=<?php echo $row_course['id']; ?>" class="btn btn-default" style="margin-top:20px;"><i class="fa fa-times"></i> Cancel</a>
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-6 col-md-6">		
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
						<a data-toggle="collapse" href="#collapse1"><i class="fa fa-plus-square"></i> Add New Row</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
						<div class="panel-body">
							<form class="form-horizontal" role="form" method="post">
								<input type="hidden" name="c_id" value="<?php echo $row_course_info['c_id']; ?>">
								<div class="form-group">
									<div class="col-sm-6">
										<input class="form-control input-sm" type="text" name="c_key[]" placeholder="c_key">
									</div>
									<div class="col-sm-6">
										<input class="form-control input-sm" type="text" name="c_value[<?php echo $i; ?>]" placeholder="c_value">
									</div>
								</div>								
								<button type="submit" name="submit-info" class="btn btn-primary"><i class="fa fa-save"></i> Add</button> 
								<a href="course_details.php?id=<?php echo $row_course['id']; ?>" class="btn btn-default"><i class="fa fa-times"></i> Cancel</a>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	}
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

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>
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