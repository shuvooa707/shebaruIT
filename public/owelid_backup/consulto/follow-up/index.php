<?php
/*
#follow up
*/
?>
<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php'); ?>

<?php
$query_followup = "SELECT * FROM followup";
$result_followup = mysqli_query($conn, $query_followup);

?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>Follow Up</h3>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/bmscl">Home</a></li>
				<li class="breadcrumb-item active">Follow Up</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
	<!-- Trigger the modal with a button -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fa fa-plus fa-fw"></i> Add Call Record</button>
	<br><br>
	<div class="panel panel-default">
		<div class="panel-heading">Follow Up List</div>
		<div class="panel-body">
			<table width="100%" class="table table-striped table-hover" id="dataTables-example">
				<thead>
					<tr>						
						<th>#</th>
						<th>Phone No.</th>
						<th>Name</th>
						<th>Last Called</th>				
						<th>Counselor</th>
						<th width="80px">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n=0;
					while($row_followup = mysqli_fetch_assoc($result_followup)) {
						$n++;
						
						$query_followup_history = "SELECT * FROM followup_history WHERE followup_id=".$row_followup['id'];
						$result_followup_history = mysqli_query($conn, $query_followup_history);
						$row_followup_history = mysqli_fetch_assoc($result_followup_history);
						
						$query_follower = "SELECT * FROM user WHERE id = ".$row_followup['id'];
						$result_follower = mysqli_query($conn, $query_follower);
						$row_follower = mysqli_fetch_assoc($result_follower);
					?>
					
							<div class="list-group">
								<tr>
									<td><?php echo $n; ?></td>
									<td><a href="contact_details.php?id=<?php echo $row_followup["id"]; ?>"><?php echo $row_followup["phone"]; ?></a></td>
									<td><?php echo $row_followup["name"]; ?></td>
									<td><?php echo $row_followup_history['followup_time']; ?></td>				
									<td><?php echo $row_follower["name"]; ?></td>
									<td align="center">
										<span title="View Full Record" class="text-primary openBtn" style="padding:0 5px;cursor:pointer" data-toggle="modal" data-target="#view" data-id="<?php echo $row_followup['id']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></span>
										<span title="Edit Information" class="text-info" style="padding:0 5px;cursor:pointer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span>
									</td>
								</tr>			 
							</div>
					<?php }	?>
				</tbody>
			</table>
		</div>
</div>

	<!-- Modal -->
	<div id="add" class="modal fade" role="dialog">
	  <div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add New Contact</h4>
				</div>
				<div class="modal-body">			
					<div class="form-group">
						<label for="">Phone No.</label>
						<input type="text" name="phone" class="form-control" placeholder="Enter Phone No.">
					</div>
					<div class="form-group">
						<label for="">Name</label>
						<input type="text" class="form-control" placeholder="Enter student's name">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="text" class="form-control" placeholder="Password">
					</div>
				</div>
				<div class="modal-footer">			
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save Contact</button>
				</div>
			</form>
		</div>

	  </div>
	</div>
	<!-- Modal -->
	<div id="view" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Follow Up History</h4>
				</div>
				<div class="modal-body" id="followup-history">			

				</div>
				<div class="modal-footer">			
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>

	  </div>
	</div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>

<script>
$('.openBtn').on('click',function(){
	
	var id = $("#dataTables-example").find("td > span").attr("data-id");
    $('#followup-history').load('followup-history.php?id='+id,function(){
        $('#view').modal({show:true});
    });
});
</script>