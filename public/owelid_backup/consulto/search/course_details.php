<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>

<?php
$sql = "SELECT *
		FROM course
		INNER JOIN university ON course.uid=university.id
		WHERE course.id=".$_GET['id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$query_course_info = "SELECT * FROM course_info	WHERE c_id=".$_GET['id'];
$result_course_info = mysqli_query($conn, $query_course_info);
$num_course_info = mysqli_num_rows($result_course_info);

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>COURSE DETAILS
				<span class="dropdown">
					<i class="fa fa-ellipsis-v dropdown-toggle" data-toggle="dropdown" aria-hidden="true" style="color:#ff5000;width:40px;text-align:center"></i>
					<ul class="dropdown-menu">
						<li><a href="add-new.php?id=<?php echo $_GET['id']; ?>" title="Add New Course"><i class="fa fa-plus fa-fw"></i> Add New</a></li>
						<li><a href="edit-course.php?id=<?php echo $_GET['id']; ?>" title="Edit this course"><i class="fa fa-pencil fa-fw"></i> Edit Course</a></li>
					</ul>
				</span>
			</h3>
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo $APP_PATH; ?>">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo $APP_PATH; ?>search">Search Course</a></li>
			  <li class="breadcrumb-item active">Course Details</li>
			</ol>
			<hr>
		</div>
    </div>
    <?php $last_update=date_create($row['updated_at']); ?>
    <p style="color: #777">Last Updated: <?php echo date_format($last_update,"d M Y");?></p>
    <div class="row" style="margin:0;background-color:#eee; border-top: solid 1px red">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xm-12">
			<h5><?php echo $row["course"]; ?> <small><?php echo $row["description"]; ?></small></h5>
		</div>
		<div class="col-lg-4 col-md-6 col-sm-6 col-xm-12">
		<h5><?php echo $row["name"]; ?></h5>
		</div>
		<?php if ($row["discount"]) {?>
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="background-color:red;color:#FFF; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">			
			<h5><?php echo $row["discount"]; ?> DISCOUNT</h5>				
		</div>
		
		<?php } ?>
    </div>
	<div class="row">
		<div class="col-lg-4">
			<h3>Basic Info.</h3>
			<table class="table">
				<tbody>
					<tr><td class="col-md-6"><b>Program</b></td><td>: <?php echo $row["program"]; ?></td></tr>
					<tr><td class="col-md-6"><b>Course Duration</b></td><td>: <?php echo $row["duration"]; ?></td></tr>
					<tr><td class="col-md-6"><b>Number of Semester</b></td><td>: <?php echo $row["nos"]; ?></td></tr>
					<tr><td class="col-md-6"><b>Intakes</b></td><td>: <?php echo $row["intake"]; ?></td></tr>
					<?php if ($row["remarks"] != "") { ?><tr><td class="col-md-6"><b>Remarks</b></td><td><?php echo $row["remarks"]; ?></td></tr><?php } ?>
					
				</tbody>
			</table>			
		</div>
		
		<div class="col-lg-4">
			<h3>Fees</h3>
			<table class="table">
				<tbody>
					<tr><td class="col-md-6"><b>EMGS and App. Fees</b></td><td>: RM <?php echo $row["emgs"]; ?></td></tr>
					<tr><td class="col-md-6"><b>Miscellaneous Fees</b></td><td>: RM <?php echo $row["misc"]; ?></td></tr>
					<tr><td class="col-md-6"><b>Total Tuition Fees</b></td><td>: RM <?php echo $row["ttf"]; ?></td></tr>
					<tr><td class="col-md-6"><b>Grand Total</b></td><td>: RM <?php if($row["grand_total"]==0) echo $row["misc"]+$row["emgs"]+$row["ttf"]; else echo $row["grand_total"]; ?></td></tr>
				</tbody>
			</table>
		</div>
		
		<?php if($num_course_info>0){ ?>
		<div class="col-lg-4">
			<h3>Fees Breakdown</h3>
			<table class="table">
				<tbody>
				<?php while($row_course_info = mysqli_fetch_assoc($result_course_info)){ ?>
				  <tr>
					<td class="col-md-6"><b><?php echo $row_course_info["c_key"]; ?></b></td>
					<td>: <?php echo $row_course_info["c_value"]; ?></td>
				  </tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
		<?php } ?>
	</div>
	<h3>Related Documents</h3>
	<hr>
	<h4><?php echo $row["doc_title"]; ?></h4>
	<?php if($row["doc_link"]){ ?>
	<iframe src="http://docs.google.com/viewer?url=http://bmscl.com.bd/admin/search/files/<?php echo $row["doc_link"]; ?>&embedded=true" width='724' height='1024' style="border: none;"></iframe>
	<?php } else echo "No documents found.";?>
</div>
<!-- /#page-wrapper -->
	

	

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>
