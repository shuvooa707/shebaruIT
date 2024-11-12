<?php
/*
#Assessment
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>
<?php
	$query_counselor = "SELECT * from user WHERE approval=1 ORDER BY e_id";
	$result_counselor = mysqli_query($conn, $query_counselor) or mysqli_error($conn);
?>
<?php
//missing form no of dhaka office
$query_missing_formno_dhaka = "SELECT a.form_no+1 AS start, MIN(b.form_no) - 1 AS end
							FROM assessment AS a, assessment AS b
							WHERE a.form_no < b.form_no AND a.office='Dhaka'
							GROUP BY a.form_no
							HAVING start < MIN(b.form_no)";
$result_missing_formno_dhaka = mysqli_query($conn, $query_missing_formno_dhaka);
$count_missing_formno_dhaka= mysqli_num_rows($result_missing_formno_dhaka);
//end missing form no

//missing form no of chittagong office
$query_missing_formno_ctg = "SELECT a.form_no+1 AS start, MIN(b.form_no) - 1 AS end
							FROM assessment AS a, assessment AS b
							WHERE a.form_no < b.form_no AND a.office='Chittagong'
							GROUP BY a.form_no
							HAVING start < MIN(b.form_no)";
$result_missing_formno_ctg = mysqli_query($conn, $query_missing_formno_ctg);
$count_missing_formno_ctg = mysqli_num_rows($result_missing_formno_ctg);
//end missing form no

//missing form no of uttara office
$query_missing_formno_uttara = "SELECT a.form_no+1 AS start, MIN(b.form_no) - 1 AS end
							FROM assessment AS a, assessment AS b
							WHERE a.form_no < b.form_no AND a.office='Uttara'
							GROUP BY a.form_no
							HAVING start < MIN(b.form_no)";
$result_missing_formno_uttara = mysqli_query($conn, $query_missing_formno_uttara);
$count_missing_formno_uttara = mysqli_num_rows($result_missing_formno_uttara);
//end missing form no

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
	if($_GET['range']=='all')
		$range = '0';
	if(isset($_GET['submit-range']))
		$range = $_GET['range'];
	
	$assessment_cond = "date>='".$range."'";
}
if(isset($_GET['office']) && isset($_GET['range']))
{
	$assessment_cond = "office='".$_GET['office']."' AND date>='".$range."'";
}

$query_assessment_my = "SELECT * FROM assessment WHERE ".$assessment_cond." AND counselor_id = ".$row_user['id']." AND active = 1 ORDER BY date DESC";
$result_query_assessment_my = mysqli_query($conn, $query_assessment_my);
$result_count_assessment_my = mysqli_num_rows($result_query_assessment_my);

$query_assessment_direct = "SELECT * FROM assessment WHERE ".$assessment_cond." AND appointed_to = ".$row_user['id']." AND active = 1 ORDER BY date DESC";
$result_query_assessment_direct = mysqli_query($conn, $query_assessment_direct);
$result_count_assessment_direct = mysqli_num_rows($result_query_assessment_direct);


	$query_assessment_my = "SELECT * FROM assessment WHERE ".$assessment_cond." AND counselor_id = ".$row_user['id']." AND active = 1 ORDER BY date DESC, form_no DESC";
	$result_query_assessment_my = mysqli_query($conn, $query_assessment_my);
	$result_count_assessment_my = mysqli_num_rows($result_query_assessment_my);
	
	$query_assessment_direct = "SELECT * FROM assessment WHERE ".$assessment_cond." AND appointed_to = ".$row_user['id']." AND active = 1 ORDER BY date DESC, form_no DESC";
	$result_query_assessment_direct = mysqli_query($conn, $query_assessment_direct);
	$result_count_assessment_direct = mysqli_num_rows($result_query_assessment_direct);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Assessment Form
				<a href="add-new.php" class="btn btn-primary btn-sm"><i class="fa fa-plus fa-fw"></i> ADD NEW</a>
				<?php if($row_user['usergroup']=="admin" OR $row_user['usergroup']=="superuser") { ?>
				<select style="font-size:16px;background-color: #779126;-webkit-border-radius: 20px;-moz-border-radius: 20px;border-radius: 20px;padding:5px 15px;color:white" class="pull-right" onchange="document.location.href=this.value">
					<option value="">Select by Counselor</option>
					<?php while($row_counselor=mysqli_fetch_assoc($result_counselor)){ ?>
					<option value="bycounselor.php?id=<?php echo $row_counselor['id']; ?>"><?php echo $row_counselor['name']; ?></option>
					<?php } ?>
				</select>
				<?php } ?>
			</h3>
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="<?php echo $_SERVER['REQUEST_URI']; ?>/../../">Home</a></li>
			  <li class="breadcrumb-item active">Assessment</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
	

	<div class="panel-group" id="accordion">
		<div class="panel panel-primary">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
				  Search Assessment
				</a>
			  </h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse">
				<div class="panel-body">	
					<?php if($row_user['usergroup'] == "admin" OR $row_user['usergroup'] == "superuser" OR $row_user['usergroup'] == "customer care"){ ?>
					<a href="<?php echo $_SERVER['PHP_SELF']."?office=all"; ?>"><button class="btn btn-primary btn-sm" style="background-color:#01a084;border-color:#01a084">All Offices</button></a>
					<a href="<?php echo $_SERVER['PHP_SELF']."?office=Dhaka"; ?>"><button class="btn btn-primary btn-sm" style="background-color:#01a084;border-color:#01a084">Dhaka Office</button></a>
					<a href="<?php echo $_SERVER['PHP_SELF']."?office=Chittagong"; ?>"><button class="btn btn-primary btn-sm" style="background-color:#01a084;border-color:#01a084">Chittagong Office</button></a>
					<a href="<?php echo $_SERVER['PHP_SELF']."?office=Uttara"; ?>"><button class="btn btn-primary btn-sm" style="background-color:#01a084;border-color:#01a084">Uttara Office</button></a>
					<a href="<?php echo $_SERVER['PHP_SELF']."?office=Jessore"; ?>"><button class="btn btn-primary btn-sm" style="background-color:#01a084;border-color:#01a084">Jessore Office</button></a>
					
					<hr>
				
					<?php } ?>
				
					<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=today"; else echo $_SERVER['PHP_SELF']."?range=today";?>"><button class="btn btn-info btn-sm" style="margin-bottom:10px">Today</button></a>
					<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=yesterday"; else echo $_SERVER['PHP_SELF']."?range=yesterday"; ?>"><button class="btn btn-info btn-sm" style="margin-bottom:10px">From Yesterday</button></a>
					<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=lastweek"; else echo $_SERVER['PHP_SELF']."?range=lastweek"; ?>"><button class="btn btn-info btn-sm" style="margin-bottom:10px">Last 7 Days</button></a>
					<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=lastmonth"; else echo $_SERVER['PHP_SELF']."?range=lastmonth"; ?>"><button class="btn btn-info btn-sm" style="margin-bottom:10px">Last 30 Days</button></a>
					<a href="<?php if(isset($_GET['office'])) echo $_SERVER['PHP_SELF']."?office=".$_GET['office']."&range=all"; else echo $_SERVER['PHP_SELF']."?range=all"; ?>"><button class="btn btn-info btn-sm" style="margin-bottom:10px">All</button></a>
				
					<button class="btn btn-info btn-sm" id="custom-range" style="margin-bottom:10px">Custom</button>
					<form method="get" class="form-inline" style="margin-bottom:10px">
						<div id="custom-submit">
						<input type="text" class="form-control input-sm" name="range" placeholder="YYYY-MM-DD">
						<button type="submit" class="btn btn-default btn-sm" name="submit-range">Submit</button>
						</div>
					</form>
					
					<hr>
					
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
				</div>
			</div>
		</div>
		<?php if($row_user['usergroup']=="admin") { ?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">My Students</a>
				</h4>
			</div>
			<div id="collapseThree" class="panel-collapse collapse">
				<div class="panel-body">					
					<div class="row" class="collapse" id="my-students">
						<div class="col-md-6">
							<div class="panel panel-info">
								<div class="panel-heading">My Students</div>
								<div class="panel-body">
									<div style='margin-bottom:20px; font-size:18px;'><div class='label label-info'>Total Available: <?php echo $result_count_assessment_my; ?></div></div>
									<div class="row">	
										<?php
										// output data of each row
										while($row_query_assessment_my = mysqli_fetch_assoc($result_query_assessment_my)) {
										?>
											<a href="view-assessment.php?id=<?php echo $row_query_assessment_my['id']; ?>">
											<div class="col-md-6">
												<div class="well" style="height:80px">
													<h4 class="text-info"><span class="label label-info pull-right">#<?php echo $row_query_assessment_my['form_no']; ?></span> <?php echo $row_query_assessment_my['name']; ?> </h4>
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
												<div class="well" style="height:80px">
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
				</div>
			</div>
		</div>
		<?php } //if admin ?>
	</div>

<?php
if($row_user['usergroup']=="counselor")
{
	$query_assessment_my = "SELECT * FROM assessment WHERE ".$assessment_cond." AND counselor_id = ".$row_user['id']." AND active = 1 ORDER BY date DESC, form_no DESC";
	$result_query_assessment_my = mysqli_query($conn, $query_assessment_my);
	$result_count_assessment_my = mysqli_num_rows($result_query_assessment_my);
	
	$query_assessment_direct = "SELECT * FROM assessment WHERE ".$assessment_cond." AND appointed_to = ".$row_user['id']." AND active = 1 ORDER BY date DESC, form_no DESC";
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
								<div class="well" style="height:80px">
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
								<div class="well" style="height:80px">
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
	if(isset($range))
	{
		$query_assessment = "SELECT * FROM assessment WHERE ".$assessment_cond."ORDER BY date DESC, form_no DESC";
		$result_query_assessment = mysqli_query($conn, $query_assessment);
		$result_count_assessment = mysqli_num_rows($result_query_assessment);
?>

		<h1><div class='btn btn-primary'>Total Available: <span class='badge'><?php echo $result_count_assessment; ?></span></div></h1>
		<div class="row">	
		
		<?php
		// output data of each row
		while($row_query_assessment = mysqli_fetch_assoc($result_query_assessment)) {
		?>
				<a href="view-assessment.php?id=<?php echo $row_query_assessment['id']; ?>">
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="well" style="height:80px">
						<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment['form_no']; ?></span> <?php echo $row_query_assessment['name']; ?> </h4>
					</div>
				</div>
				</a>
				
		<?php } ?>

		</div><!--/row-->
<?php		
	}
	else
	{
?>
	<?php
	//current month
	$query_assessment1 = "SELECT * FROM assessment WHERE ".$assessment_cond." AND date BETWEEN '".date('Y-m-d', strtotime(date('Y-m-1')))."' AND '".date('Y-m-d')."' AND active = 1 ORDER BY date DESC, form_no DESC";
	$result_query_assessment1 = mysqli_query($conn, $query_assessment1);
	$result_count_assessment1 = mysqli_num_rows($result_query_assessment1);	

	//last month
	$query_assessment2 = "SELECT * FROM assessment WHERE ".$assessment_cond." AND date BETWEEN '".date('Y-m-d', strtotime('first day of last month'))."' AND '".date('Y-m-d', strtotime('last day of last month'))."' AND active = 1 ORDER BY date DESC, form_no DESC";
	$result_query_assessment2 = mysqli_query($conn, $query_assessment2);
	$result_count_assessment2 = mysqli_num_rows($result_query_assessment2);	

	//2 months ago
	$query_assessment3 = "SELECT * FROM assessment WHERE ".$assessment_cond." AND date BETWEEN '".date('Y-m-d', strtotime('first day of 2 months ago'))."' AND '".date('Y-m-d', strtotime('last day of 2 months ago'))."' AND active = 1 ORDER BY date DESC, form_no DESC";
	$result_query_assessment3 = mysqli_query($conn, $query_assessment3);
	$result_count_assessment3 = mysqli_num_rows($result_query_assessment3);	
	?>
	<hr>
	<ul class="nav nav-tabs" id="myTab"">
	  <li class="active"><a data-toggle="tab" href="#current_month"><?php echo date('F'); ?> <span class='badge'><?php echo $result_count_assessment1; ?></span></a></li>
	  <li><a data-toggle="tab" href="#second_month"><?php echo date("F", strtotime("last month")); ?> <span class='badge'><?php echo $result_count_assessment2; ?></span></a></li>
	  <li><a data-toggle="tab" href="#third_month"><?php echo date("F", strtotime("2 months ago")); ?> <span class='badge'><?php echo $result_count_assessment3; ?></span></a></li>
	</ul>

	<div class="tab-content">
	  <div id="current_month" class="tab-pane fade in active">
		<h3>Assessments of <?php echo date('F'); ?></h3>
		
		<div class="row">	
		<?php
		// output data of each row
		while($row_query_assessment1 = mysqli_fetch_assoc($result_query_assessment1)) {
		?>
			<a href="view-assessment.php?id=<?php echo $row_query_assessment1['id']; ?>">
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<div class="well" style="height:80px">
					<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment1['form_no']; ?></span> <?php echo $row_query_assessment1['name']; ?> </h4>
				</div>
			</div>
			</a>
				
		<?php } ?>
		</div><!--/row-->
		
	  </div>
	  <div id="second_month" class="tab-pane fade">
		<h3>Assessments of <?php echo date("F", strtotime("last month")); ?></h3>
		<div class="row">	
			<?php
			// output data of each row
			while($row_query_assessment2 = mysqli_fetch_assoc($result_query_assessment2)) {
			?>
			<a href="view-assessment.php?id=<?php echo $row_query_assessment2['id']; ?>">
			<div class="col-lg-3 col-sm-6 col-xs-12">
				<div class="well" style="height:80px">
					<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment2['form_no']; ?></span> <?php echo $row_query_assessment2['name']; ?> </h4>
				</div>
			</div>
			</a>		
			<?php } ?>

		</div><!--/row-->
	  </div>
	  <div id="third_month" class="tab-pane fade">
		<h3>Assessments of <?php echo date("F", strtotime("2 montha ago")); ?></h3>
		<hr>
			<div class="row">		
				<?php
				// output data of each row
				while($row_query_assessment3 = mysqli_fetch_assoc($result_query_assessment3)) {
				?>
				<a href="view-assessment.php?id=<?php echo $row_query_assessment3['id']; ?>">
				<div class="col-lg-3 col-sm-6 col-xs-12">
					<div class="well" style="height:80px">
						<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment3['form_no']; ?></span> <?php echo $row_query_assessment3['name']; ?> </h4>
					</div>
				</div>
				</a>				
				<?php } ?>
			</div><!--/row-->
	  </div>
	</div>

	<?php }} ?>	
</div>
<!-- /#page-wrapper -->

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>
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