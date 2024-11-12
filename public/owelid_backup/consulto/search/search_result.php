<?php

require_once(__DIR__.'/../header.php');

$course = $_GET["course"];
$program = strtolower($_GET["program"]);
$university = $_GET["university"];

if($program=="" && $university=="")
$cond = "%$course%";

elseif($program<>"" && $university=="")
	$cond = "%$course%' AND program='$program";
	
elseif($program=="" && $university<>"")
	$cond = "%$course%' AND university.id='$university";

else
	$cond = "%$course%' AND program='$program' AND university.id='$university";

//get matched courses
$sql = "SELECT course.id, course, name, program, duration, nos, emgs, ttf 
		FROM course
		INNER JOIN university ON course.uid=university.id
		WHERE course LIKE '".$cond."'";
$result = mysqli_query($conn, $sql);

//get universities
$uni_sql = "SELECT * FROM university ORDER BY name ASC";
$uni_result = mysqli_query($conn, $uni_sql);

?> 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>FIND A COURSE</h3>
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="/admin">Home</a></li>
			  <li class="breadcrumb-item"><a href="/admin/search">Search Course</a></li>
			  <li class="breadcrumb-item active">Search Result</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
		
		<div class="jumbotron" style="padding-left:20px;padding-right:20px;">
			<form>			
				<div class="row">
					<div class="form-group col-md-4">						
						<select name="program" class="form-control pull-right">
							  <option value="">All Levels</option>
							  <option value="PhD" <?php if($program=="PhD")echo "selected"; ?> >PhD</option>
							  <option value="masters" <?php if($program=="masters")echo "selected"; ?> >Masters</option>
							  <option value="bachelor" <?php if($program=="bachelor")echo "selected"; ?> >Bachelor</option>
							  <option value="diploma" <?php if($program=="diploma")echo "selected"; ?> >Diploma</option>
							  <option value="foundation" <?php if($program=="foundation")echo "selected"; ?> >Foundation</option>
							  <option value="pre-university" <?php if($program=="pre-university")echo "selected"; ?>>Pre-University</option>
							  <option value="professional" <?php if($program=="professional")echo "selected"; ?> >Professional</option>
							  <option value="certificate" <?php if($program=="certificate")echo "selected"; ?> >Certificate</option>
							  <option value="language" <?php if($program=="language")echo "selected"; ?> >Language</option>
						</select>
					</div>
					<div class="form-group col-md-8">						
						<select name="university" class="form-control">
							  <option value="">All Universities</option>
							  <?php
								if (mysqli_num_rows($uni_result) > 0) {
									// output data of each row
									while($uni_row = mysqli_fetch_assoc($uni_result)) {
								?>
								<option value="<?php echo $uni_row["id"];?>" <?php if($university==$uni_row["id"])echo "selected"; ?> ><?php echo $uni_row["name"]; ?></option>
								<?php
										}
									}
								?>								  
						</select>						
					</div>
				</div>
				
				<div class="input-group">
					<input name="course" type="text" class="form-control" placeholder="Search Course Title" value="<?php echo $course; ?>">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
					</span>
				</div><!-- /input-group -->
			</form>
		</div>
			
			
		<?php if (mysqli_num_rows($result) > 0) { ?>
		
		<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
				<tr>					
					<th>Course Name</th>
					<th>University</th>
					<th>Level</th>
					<th>Duration</th>				
					<th>Tuition Fees</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$n = 1;
					
						// output data of each row
						while($row = mysqli_fetch_assoc($result)) {
				?>        
						<div class="list-group">
							<tr>
								
								<td><a href="course_details.php?id=<?php echo $row["id"]; ?>"><?php echo $row["course"]; ?></a></td>
								<td><?php echo $row["name"]; ?></td>
								<td><?php echo $row["program"]; ?></td>
								<td><?php echo $row["duration"]; ?></td>				
								<td>RM <?php echo $row["ttf"]; ?></td>
							</tr>			 
						</div>
				<?php }	?>
			</tbody>
		</table>
		
		<?php }	
		else
		{
		?>
			<span class="text-danger"><h2>No Data Found! Please try to search another course.</h2></span>
		<?php }	?>
</div>
<!-- /#page-wrapper -->
		
            		
		
	 
<?php require_once(__DIR__.'/../footer.php'); ?>
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
	});
</script>