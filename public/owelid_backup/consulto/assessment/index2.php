<?php
/*
#Assessment
*/
?>
<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bmscl/header2.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Assessment Form</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	

	<div class="row">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Visitors location <small>geo-presentation</small></h2>
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Settings 1</a></li>
										<li><a href="#">Settings 2</a></li>
									</ul>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">					
							<div class="dashboard-widget-content">                        
								<?php
								$assessment_cond = 1;

								if($row_user['usergroup']=="counselor")
									$assessment_cond = "counselor_id = ".$row_user['id'];

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
										<div class="col-md-3">
											<div class="well" style="height:100px">
												<h4 class="text-primary"><span class="label label-primary pull-right">#<?php echo $row_query_assessment['form_no']; ?></span> <?php echo $row_query_assessment['name']; ?> </h4>
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
		<div class="col-md-4 col-sm-4 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Recent Activities <small>Sessions</small></h2>
					<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Settings 1</a></li>
								<li><a href="#">Settings 2</a></li>
							</ul>
						</li>
						<li><a class="close-link"><i class="fa fa-close"></i></a></li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<div class="dashboard-widget-content">
						<a href="add-new.php"><button class="btn btn-primary" ><i class="fa fa-plus fa-fw"></i> ADD</button></a>
						<a href="edit.php"><button class="btn btn-info" ><i class="fa fa-pencil fa-fw"></i> EDIT</button></a>
						<a href="#"><button class="btn btn-danger" ><i class="fa fa-remove  fa-fw"></i> DELETE</button></a>
						<hr>
						
						<a href="<?php echo $_SERVER['PHP_SELF']."?office=all"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">All Offices</button></a>
						<a href="<?php echo $_SERVER['PHP_SELF']."?office=Dhaka"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">Dhaka Office</button></a>
						<a href="<?php echo $_SERVER['PHP_SELF']."?office=Chittagong"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">Chittagong Office</button></a>
						<a href="<?php echo $_SERVER['PHP_SELF']."?office=Jessore"; ?>"><button class="btn btn-primary" style="background-color:#01a084;border-color:#01a084">Jessore Office</button></a>
						<hr>
						
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
		</div>
	</div>








	

	
</div>
<!-- /#page-wrapper -->

<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bmscl/footer2.php'); ?>
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