<?php
/*
#Student
*/
?>
<?php require_once(__DIR__.'/../header.php'); ?>
<?php
$query_user = "SELECT * FROM user WHERE approval=1 ORDER BY e_id";
$result_query_user = mysqli_query($conn, $query_user);
$result_count_user = mysqli_num_rows($result_query_user);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Closed Student File</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
<style>
.wrapper {
    position:relative;
    margin:0 auto;
    overflow:hidden;
	padding:5px;
  	height:50px;
}

.list {
    position:absolute;
    left:0px;
    top:0px;
  	min-width:3000px;
  	margin-left:12px;
    margin-top:0px;
}

.list li{
	display:table-cell;
    position:relative;
    text-align:center;
    cursor:grab;
    cursor:-webkit-grab;
    color:#efefef;
    vertical-align:middle;
}

.scroller {
  text-align:center;
  cursor:pointer;
  display:none;
  padding:7px;
  padding-top:11px;
  white-space:no-wrap;
  vertical-align:middle;
  background-color:#fff;
}

.scroller-right{
  float:right;
}

.scroller-left {
  float:left;
}
</style>
<?php
$query_student = "SELECT * FROM student WHERE active=0 ORDER BY gd_no DESC";
$result_query_student = mysqli_query($conn, $query_student);
$result_count_student = mysqli_num_rows($result_query_student);

if($row_user['usergroup']=="counselor")
{
$query_student = "SELECT *, s.id, s.name, s.university, s.program, s.subject FROM student s
					INNER JOIN assessment ON assessment.id=s.assessment_id
					WHERE (assessment.counselor_id=".$row_user['id']. " OR assessment.appointed_to=".$row_user['id'].") AND s.active=0";
$result_query_student = mysqli_query($conn, $query_student);
$result_count_student = mysqli_num_rows($result_query_student);
}

?>
<?php
if($row_user['usergroup']=="superuser" OR $row_user['usergroup']=="admin"){
?>
  <div class="scroller scroller-left"><i class="glyphicon glyphicon-chevron-left"></i></div>
  <div class="scroller scroller-right"><i class="glyphicon glyphicon-chevron-right"></i></div>
  <div class="wrapper">

  
	<ul class="nav nav-tabs list" id="myTab">
		<li class="active" ><a data-toggle="tab" href="#all">All</a></li>
		<?php
		while($row_query_user = mysqli_fetch_assoc($result_query_user)) {
		echo "<li><a data-toggle='tab' href='#".$row_query_user['id']."'>".$row_query_user['name']."</a></li>";
		}
		?>
	</ul>
  </div>
<?php } ?>
	<div class="tab-content" style="margin-top:20px">
		<div id="all" class="tab-pane fade in active">
			
			<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: <?php echo $result_count_student; ?></div></div>
			
			<div class="row">
			
					<?php
					//count total
					$i=0;
					// output data of each row
					while($row_query_student = mysqli_fetch_assoc($result_query_student)) {
						$query_counselor = "SELECT user.name FROM user
											INNER JOIN assessment ON (assessment.counselor_id=user.id OR assessment.appointed_to=user.id) 
											INNER JOIN student ON student.assessment_id=assessment.id 
											WHERE student.id=".$row_query_student['id']." AND student.active=0";
						
						$result_query_counselor = mysqli_query($conn, $query_counselor);
						$row_query_counselor = mysqli_fetch_assoc($result_query_counselor);
						$i++;
							
						$progress=0;
						if($row_query_student['application']!=0) $progress=$progress+5;
						if($row_query_student['offer_letter']!=0) $progress=$progress+10; 
						if($row_query_student['medical']!=0) $progress=$progress+5; 
						if($row_query_student['payment1']!=0) $progress=$progress+15; 
						if($row_query_student['complete_app']!=0) $progress=$progress+10; 
						if($row_query_student['VAL']!=0) $progress=$progress+15; 
						if($row_query_student['payment2']!=0) $progress=$progress+15; 
						if($row_query_student['send_sticker']!=0) $progress=$progress+5;					
						if($row_query_student['rcv_sticker']!=0) $progress=$progress+10;					
						if($row_query_student['fly']!=0) $progress=$progress+10; 
						
					?>

					<div class="col-lg-4 col-sm-6 col-xs-12">
						<div class="well" style="background:#fff;">
							<div class="progress">
							  <div class="progress-bar" role="progressbar" style="width: <?php echo $progress; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $progress."%"; ?></div>
							</div>
							<h4 class="text-primary"><a href="../student/view-student.php?id=<?php echo $row_query_student['id']; ?>"><?php echo $row_query_student['name']; ?></a></h4>
							<p><?php echo $row_query_student['university']; ?></p>
							<p><?php echo $row_query_student['program']; ?></p>
							<p><?php echo $row_query_student['subject']; ?></p>
							<div class="col-lg-4-offset" style="width:130px;display: block; margin: 0 auto;">
								<a href="../student/view-student.php?id=<?php echo $row_query_student['id']; ?>" class="btn btn-sm btn-default"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
								<a href="../student/edit-student.php?id=<?php echo $row_query_student['id']; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
							</div>
						</div>
					</div>
					
					<?php } ?>

			</div><!--/row-->    
		</div>
		
		<?php
		$query_user = "SELECT * FROM user WHERE approval=1";
		$result_query_user = mysqli_query($conn, $query_user);
		$result_count_user = mysqli_num_rows($result_query_user);
		?>
		<?php while($row_query_user = mysqli_fetch_assoc($result_query_user)) {	?>
		<div id="<?php echo $row_query_user['id']; ?>" class="tab-pane fade">
			<?php
			$query_student = "SELECT *, s.id, s.name, s.university, s.program, s.subject FROM student s
								INNER JOIN assessment ON assessment.id=s.assessment_id
								WHERE (assessment.counselor_id=".$row_query_user['id']. " OR assessment.appointed_to=".$row_query_user['id'].") AND s.active=0";
			$result_query_student = mysqli_query($conn, $query_student);
			$result_count_student = mysqli_num_rows($result_query_student);
			?>
			<div style='margin-bottom:20px; font-size:18px;'><div class='label label-success'>Total Available: <?php echo $result_count_student; ?></div></div>
			<div class="row">
			<?php
				// output data of each row
				while($row_query_student = mysqli_fetch_assoc($result_query_student)) {
						
					$progress=0;
					if($row_query_student['application']!=0) $progress=$progress+5;
					if($row_query_student['offer_letter']!=0) $progress=$progress+10; 
					if($row_query_student['medical']!=0) $progress=$progress+5; 
					if($row_query_student['payment1']!=0) $progress=$progress+15; 
					if($row_query_student['complete_app']!=0) $progress=$progress+10; 
					if($row_query_student['VAL']!=0) $progress=$progress+15; 
					if($row_query_student['payment2']!=0) $progress=$progress+15; 
					if($row_query_student['send_sticker']!=0) $progress=$progress+5;					
					if($row_query_student['rcv_sticker']!=0) $progress=$progress+10;					
					if($row_query_student['fly']!=0) $progress=$progress+10; 
					
			?>
			
				<div class="col-lg-4 col-sm-6 col-xs-12">
					<div class="well" style="background:#fff;">
						<div class="progress">
						  <div class="progress-bar" role="progressbar" style="width: <?php echo $progress; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $progress."%"; ?></div>
						</div>
						<h4 class="text-primary"><a href="../student/view-student.php?id=<?php echo $row_query_student['id']; ?>"><?php echo $row_query_student['name']; ?></a></h4>
						<p><?php echo $row_query_student['university']; ?></p>
						<p><?php echo $row_query_student['program']; ?></p>
						<p><?php echo $row_query_student['subject']; ?></p>
						<div class="col-lg-4-offset" style="width:130px;display: block; margin: 0 auto;">
							<a href="../student/view-student.php?id=<?php echo $row_query_student['id']; ?>" class="btn btn-sm btn-default"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
							<a href="../student/edit-student.php?id=<?php echo $row_query_student['id']; ?>" class="btn btn-sm btn-default"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
						</div>
					</div>
				</div>
			
			<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>
	

	    <!-- jQuery -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	
<script>
var hidWidth;
var scrollBarWidths = 40;

var widthOfList = function(){
  var itemsWidth = 0;
  $('.list li').each(function(){
    var itemWidth = $(this).outerWidth();
    itemsWidth+=itemWidth;
  });
  return itemsWidth;
};

var widthOfHidden = function(){
  return (($('.wrapper').outerWidth())-widthOfList()-getLeftPosi())-scrollBarWidths;
};

var getLeftPosi = function(){
  return $('.list').position().left;
};

var reAdjust = function(){
  if (($('.wrapper').outerWidth()) < widthOfList()) {
    $('.scroller-right').show();
  }
  else {
    $('.scroller-right').hide();
  }
  
  if (getLeftPosi()<0) {
    $('.scroller-left').show();
  }
  else {
    $('.item').animate({left:"-="+getLeftPosi()+"px"},'slow');
  	$('.scroller-left').hide();
  }
}

reAdjust();

$(window).on('resize',function(e){  
  	reAdjust();
});

$('.scroller-right').click(function() {
  $('.scroller-left').fadeIn('slow');
  if(widthOfHidden()>-200){
  $('.scroller-right').fadeOut('slow');
  }
  
  //$('.list').animate({left:"+="+widthOfHidden()+"px"},'slow',function(){
  $('.list').animate({left:"+="+-200+"px"},'slow',function(){

  });
});

$('.scroller-left').click(function() {
  
	$('.scroller-right').fadeIn('slow');
	$('.scroller-left').fadeOut('slow');
  
  	$('.list').animate({left:"-="+getLeftPosi()+"px"},'slow',function(){
  	
  	});
});    
</script>   
    

</div>
<!-- /#page-wrapper -->

<?php require_once(__DIR__.'/../footer.php'); ?>