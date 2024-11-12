<?php
/*
#Assessment
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bmscl/header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Assessment Form</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	

	<a href="add-new.php"><button class="btn btn-primary" ><i class="fa fa-plus fa-fw"></i> ADD</button></a>
	<a href="edit.php"><button class="btn btn-info" ><i class="fa fa-pencil fa-fw"></i> EDIT</button></a>
	<hr>
	
	<?php if($row_user['usergroup'] == "admin" OR $row_user['usergroup'] == "superuser" OR $row_user['usergroup'] == "customer care"){ ?>
	<a href="<?php echo $_SERVER['PHP_SELF']."?office=all"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">All Offices</button></a>
	<a href="<?php echo $_SERVER['PHP_SELF']."?office=Dhaka"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">Dhaka Office</button></a>
	<a href="<?php echo $_SERVER['PHP_SELF']."?office=Chittagong"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">Chittagong Office</button></a>
	<a href="<?php echo $_SERVER['PHP_SELF']."?office=Jessore"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">Jessore Office</button></a>
	<hr>
	<?php } ?>
	
	<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=today"; else echo $_SERVER['PHP_SELF']."?range=today";?>"><button class="btn btn-info" style="margin-bottom:10px">Today</button></a>
	<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=yesterday"; else echo $_SERVER['PHP_SELF']."?range=yesterday"; ?>"><button class="btn btn-info" style="margin-bottom:10px">From Yesterday</button></a>
	<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=lastweek"; else echo $_SERVER['PHP_SELF']."?range=lastweek"; ?>"><button class="btn btn-info" style="margin-bottom:10px">Last 7 Days</button></a>
	<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=lastmonth"; else echo $_SERVER['PHP_SELF']."?range=lastmonth"; ?>"><button class="btn btn-info" style="margin-bottom:10px">Last 30 Days</button></a>
	<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']; else echo $_SERVER['PHP_SELF']; ?>"><button class="btn btn-info" style="margin-bottom:10px">All</button></a>
	<button class="btn btn-info" id="custom-range" style="margin-bottom:10px">Custom</button>	
	
	<form method="get" class="form-inline" style="margin-bottom:10px">
		<div id="custom-submit">
		<input type="text" class="form-control" name="range" placeholder="YYYY-MM-DD">
		<button type="submit" class="btn btn-default" name="submit-range">Submit</button>
		</div>
	</form>
	<h3>OR</h3>
	<div class="row">
		<div class="search-box col-md-3">
			<label>Search by Form No.</label>
			<input id="byFormno" type="text" autocomplete="off" class="form-control" placeholder="Type Form No." />
			<div class="result"></div>
		</div>
		<div class="search-box col-md-3">
			<label>Search by Name</label>
			<input id="byName" type="text" autocomplete="off" class="form-control" placeholder="Type first few letters of the name" />
			<div class="result"></div>
		</div>
		<div class="search-box col-md-3">
			<label>Search by Mobile No.</label>
			<input id="byMobile" type="text" autocomplete="off" class="form-control" placeholder="Type first few digits of the number" />
			<div class="result"></div>
		</div>
		<div class="search-box col-md-3">
			<label>Search by Date</label>
			<input id="byDate" type="text" autocomplete="off" class="form-control" placeholder="YYYY-MM-DD" />
			<div class="result"></div>
		</div>
	</div>
	
	<hr>
	
<?php
$assessment_cond = 1;

//filter by office
if(isset($_GET['office']))
{
	$assessment_cond = "office='".$_GET['office']."'";
	
	if($_GET['office']=='all')
		$assessment_cond = 1;
}

//filter by date range
if(isset($_GET['range']))
{
	if($_GET['range']=='today')
		$range = date('Y-m-d');
	if($_GET['range']=='yesterday')
		$range = date('Y-m-d', strtotime('-1 day'));
	if($_GET['range']=='lastweek')
		$range = date('Y-m-d', strtotime('-7 days'));
	if($_GET['range']=='lastmonth')
		$range = date('Y-m-d', strtotime('-30 days'));
	if(isset($_GET['submit-range']))
		$range = $_GET['range'];
	
	$assessment_cond = "date>='".$range."'";
}
if(isset($_GET['office']) && isset($_GET['range']))
{
	$assessment_cond = "office='".$_GET['office']."' AND date>='".$range."'";
}
?>
<?php
if($row_user['usergroup']=="admin")
{
	$query_assessment_my = "SELECT * FROM assessment WHERE ".$assessment_cond." AND counselor_id = ".$row_user['id']." ORDER BY form_no DESC";
	$result_query_assessment_my = mysqli_query($conn, $query_assessment_my);
	$result_count_assessment_my = mysqli_num_rows($result_query_assessment_my);
	
	$query_assessment_direct = "SELECT * FROM assessment WHERE ".$assessment_cond." AND appointed_to = ".$row_user['id']." ORDER BY form_no DESC";
	$result_query_assessment_direct = mysqli_query($conn, $query_assessment_direct);
	$result_count_assessment_direct = mysqli_num_rows($result_query_assessment_direct);
?>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">My Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-primary'>Total Available: <?php echo $result_count_assessment_my; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_my = mysqli_fetch_assoc($result_query_assessment_my)) {
						?>
							<a href="view-assessment.php?id=<?php echo $row_query_assessment_my['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment_my['form_no']; ?></span> <?php echo $row_query_assessment_my['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row-->    
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">Assigned Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-info'>Total Available: <?php echo $result_count_assessment_direct; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_direct = mysqli_fetch_assoc($result_query_assessment_direct)) {
						?>
							<a href="view-assessment.php?id=<?php echo $row_query_assessment_direct['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-info"><span class="label label-info pull-right">#<?php echo $row_query_assessment_direct['form_no']; ?></span> <?php echo $row_query_assessment_direct['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row--> 
				</div>
			</div>
		</div>
	</div>
	
<?php	
} // if admin
?>
<?php
if($row_user['usergroup']=="counselor")
{
	$query_assessment_my = "SELECT * FROM assessment WHERE ".$assessment_cond." AND counselor_id = ".$row_user['id']." ORDER BY form_no DESC";
	$result_query_assessment_my = mysqli_query($conn, $query_assessment_my);
	$result_count_assessment_my = mysqli_num_rows($result_query_assessment_my);
	
	$query_assessment_direct = "SELECT * FROM assessment WHERE ".$assessment_cond." AND appointed_to = ".$row_user['id']." ORDER BY form_no DESC";
	$result_query_assessment_direct = mysqli_query($conn, $query_assessment_direct);
	$result_count_assessment_direct = mysqli_num_rows($result_query_assessment_direct);
?>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">My Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-primary'>Total Available: <?php echo $result_count_assessment_my; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_my = mysqli_fetch_assoc($result_query_assessment_my)) {
						?>
							<a href="view-assessment.php?id=<?php echo $row_query_assessment_my['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment_my['form_no']; ?></span> <?php echo $row_query_assessment_my['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row-->    
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-info">
				<div class="panel-heading">Assigned Students</div>
				<div class="panel-body">
					<div style='margin-bottom:20px; font-size:18px;'><div class='label label-info'>Total Available: <?php echo $result_count_assessment_direct; ?></div></div>
					<div class="row">	
						<?php
						// output data of each row
						while($row_query_assessment_direct = mysqli_fetch_assoc($result_query_assessment_direct)) {
						?>
							<a href="view-assessment.php?id=<?php echo $row_query_assessment_direct['id']; ?>">
							<div class="col-md-6">
								<div class="well" style="height:100px">
									<h4 class="text-info"><span class="label label-info pull-right">#<?php echo $row_query_assessment_direct['form_no']; ?></span> <?php echo $row_query_assessment_direct['name']; ?> </h4>
								</div>
							</div>
							</a>									
						<?php } ?>

					</div><!--/row--> 
				</div>
			</div>
		</div>
	</div>
	
<?php	
} // if counselor
else
{
?>

<?php
$query_assessment = "SELECT * FROM assessment WHERE ".$assessment_cond." ORDER BY form_no DESC";
$result_query_assessment = mysqli_query($conn, $query_assessment);
$result_count_assessment = mysqli_num_rows($result_query_assessment);	
echo "<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: ".$result_count_assessment."</div></div>";

?>

    <div class="row">
	
<?php

// output data of each row
while($row_query_assessment = mysqli_fetch_assoc($result_query_assessment)) {
?>
		<a href="view-assessment.php?id=<?php echo $row_query_assessment['id']; ?>">
		<div class="col-lg-3 col-sm-6 col-xs-12">
			<div class="well" style="height:100px">
				<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment['form_no']; ?></span> <?php echo $row_query_assessment['name']; ?> </h4>
			</div>
		</div>
		</a>
		
<?php } ?>

    </div><!--/row-->    
<?php } ?>	
</div>
<!-- /#page-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bmscl/footer.php'); ?>
<script>
$(function() {
	$('#custom-submit').hide();
  $('#custom-range').click(function(){
    $('#custom-submit').show(300);
  });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.search-box #byFormno').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("backend-search.php", {Formno: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    $('.search-box #byName').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("backend-search.php", {queryName: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
	$('.search-box #byMobile').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("backend-search.php", {queryMobile: term}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
	$('.search-box #byDate').on("keyup input", function(){
        /* Get input value on change */
        var term = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(term.length){
            $.get("backend-search.php", {queryDate: term}).done(function(data){
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