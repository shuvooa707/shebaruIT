
<?php require_once('db_conn.php'); ?>
  
<?php
$sql = "SELECT * FROM university";
$result = mysqli_query($conn, $sql);
?>

<?php require_once('header.php'); ?>

    <div class="jumbotron">
	
		<div class="container">
		
			<form method="GET" action="search_result.php">
				
				<div class="row">
				
					<div class="form-group col-md-4">
						<label for="uni">Select University</label>
						<select class="form-control" id="university">
							<option value="">All Universities</option>
							<?php
								if (mysqli_num_rows($result) > 0) {
									// output data of each row
									while($row = mysqli_fetch_assoc($result)) {
										
										echo "<option value='".$row['id']."'>".$row['name']."</option>";
									} 
								}
							?>
						</select>
					</div>
					
					<div class="form-group col-md-4">
						<label for="program">Level of Study</label>
						<select name="type" class="form-control pull-right">
							<option value="">All</option>
							<option value="PhD">PhD</option>
							<option value="masters">Masters</option>
							<option value="undergraduate">Bachelor</option>
							<option value="diploma">Diploma</option>
							<option value="foundation">Foundation</option>
							<option value="professional">Professional</option>
							<option value="certificate">Certificate</option>
							<option value="language">Language</option>
						</select>
						
					</div>
					
					<div class="form-group col-md-4">
						<label for="mtf">Tuition Fee (RM)</label>
						<input name="tuition" type="text" class="form-control" placeholder="Maximum Tuition Fee">
					</div>
				 
				</div>
				<div class="row">
					<div class="form-group col-md-4">
						<label for="type">Type of Institution</label>
						<select name="type" class="form-control pull-right">
							<option value="">All</option>
							<option value="Public University">Public University</option>
							<option value="Private University">Private University</option>
							<option value="Private College">Private College</option>
						</select>
						
					</div>
					
					
					<div class="form-group col-md-8">
						<label for="course">Course</label>
						<input name="tuition" type="text" class="form-control" placeholder="Search Course Title">
					</div>		
					
				</div>

				<button class="btn btn-primary center-block" style="margin-top:20px" type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
				
			</form>
		
		</div>

	</div>
	

<?php require_once('footer.php'); ?> 
<?php mysqli_close($conn); ?>