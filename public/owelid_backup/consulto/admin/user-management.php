<?php
/*
#Admin
*/
?>
<?php require_once(__DIR__.'/../header.php'); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">USER INFO</h3>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->	
	
	
	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-default">
				<div class="panel-heading">
                    User Approval
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">


					<?php 
					//get matched courses
					$query_approval = "SELECT *	FROM user WHERE approval=0";
					$result_query_approval = mysqli_query($conn, $query_approval);
					
					if (mysqli_num_rows($result_query_approval) > 0) { 
					?>
					
					<table class="table table-striped table-bordered table-hover table-responsive">
						<thead>
							<tr>						
								<th><abbr title="Employee ID">E ID</abbr></th>
								<th>Name</th>
								<th>Designation</th>
								<th>Approval</th>				
							</tr>
						</thead>
						<tbody>
							<?php								
								// output data of each row
								while($row_query_approval = mysqli_fetch_assoc($result_query_approval)) {
							?>        
							<div class="list-group">
								<tr>									
									<td><?php echo $row_query_approval["e_id"]; ?></td>
									<td><?php echo $row_query_approval["name"]; ?></td>
									<td><?php echo $row_query_approval["designation"]; ?></td>
									<td><a href="#" id="approval_id" class="btn btn-primary btn-xs" approval-user-id="<?php echo $row_query_approval['id']; ?>">Approve Now</a></td>
								</tr>			 
							</div>
							<?php }	?>
						</tbody>
					</table>
					
					<?php }	
					else
					{
					?>
					<span class="text-info"><p>Good Work! All users are approved.</p></span>
					<?php }	?>
		
                </div>
                <!-- /.panel-body -->
            </div>
		</div>
		<!-- /.col-lg-8 -->	
	</div>
	<!-- /.row -->	

	<div class="panel panel-default">
		<div class="panel-heading">
			All User List
		</div>
		<!-- /.panel-heading -->
		<div class="panel-body">


			<?php 
			//get matched courses
			$query_all_user = "SELECT *	FROM user ORDER BY e_id";
			$result_query_all_user = mysqli_query($conn, $query_all_user);
			
			if (mysqli_num_rows($result_query_all_user) > 0) { 
			?>
			
			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example" style="font-size:11px">
				<thead>
					<tr>
						<th><abbr title="Employee ID">E ID</abbr></th>
						<th>Name</th>
						<th>Designation</th>
						<th>Phone 1</th>
						<th>Email</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php								
						// output data of each row
						while($row_query_all_user = mysqli_fetch_assoc($result_query_all_user)) {
					?>        
					<div class="list-group">
						<tr>									
							<td><?php echo $row_query_all_user["e_id"]; ?></td>
							<td><?php echo $row_query_all_user["name"]; ?></td>
							<td><?php echo $row_query_all_user["designation"]; ?></td>
							<td><?php echo $row_query_all_user["phone1"]; ?></td>
							<td><?php echo $row_query_all_user["email"]; ?></td>
							<td align="center"><a href="view-user.php?id=<?php echo $row_query_all_user['id']; ?>"><i title="View" class="fa fa-eye fa-fw"></i></a> &nbsp; <a href="edit-user.php?id=<?php echo $row_query_all_user['id']; ?>"><i title="Edit" class="fa fa-pencil-square-o fa-fw"></i></a></td>
						</tr>			 
					</div>
					<?php }	?>
				</tbody>
			</table>
			
			<?php }	
			else
			{
			?>
			<span class="text-danger"><p>Error! Something went wrong.</p></span>
			<?php }	?>

		</div>		
	</div>		
			
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
