<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php'); ?>
<?php
$query_followup_history = "SELECT * FROM followup_history WHERE followup_id=".$_GET['id']." ORDER BY id DESC";
$result_followup_history = mysqli_query($conn, $query_followup_history);

?>
			<table width="100%" class="table table-striped table-hover" id="dataTables-example">
				<thead>
					<tr>						
						<th>#</th>
						<th>Follow-Up Time</th>
						<th>Conversation</th>
						<th>Counselor</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$n=0;
					while($row_followup_history = mysqli_fetch_assoc($result_followup_history)) {
						$n++;						
						$query_follower = "SELECT * FROM user WHERE id = ".$row_followup_history['counselor_id'];
						$result_follower = mysqli_query($conn, $query_follower);
						$row_follower = mysqli_fetch_assoc($result_follower);
					?>
					
							<div class="list-group">
								<tr>
									<td><?php echo $n; ?></td>
									<td width="150px"><?php echo $row_followup_history["followup_time"]; ?></td>
									<td><?php echo $row_followup_history['conversation']; ?></td>				
									<td width="150px"><?php echo $row_follower["name"]; ?></td>
								</tr>			 
							</div>
					<?php }	?>
				</tbody>
			</table>