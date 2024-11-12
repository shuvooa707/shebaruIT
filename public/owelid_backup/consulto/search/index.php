<?php
/*
folder: search
*/
?>
<?php require_once(__DIR__.'/../header.php'); ?>
  

<?php
$uni_sql = "SELECT * FROM university ORDER BY name ASC";
$uni_result = mysqli_query($conn, $uni_sql);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3>FIND A COURSE</h3>
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="/localhost/admin">Home</a></li>
			  <li class="breadcrumb-item active">Search Course</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
		
		<div class="jumbotron" style="padding-left:20px;padding-right:20px;">
			<form action="search_result.php">			
				<div class="row">
					<div class="form-group col-md-4">						
						<select name="program" class="form-control pull-right  ">
							  <option value="">All Levels</option>
							  <option value="PhD">PhD</option>
							  <option value="masters">Masters</option>
							  <option value="bachelor">Bachelor</option>
							  <option value="diploma">Diploma</option>
							  <option value="foundation">Foundation</option>
							  <option value="pre-university">Pre-University</option>
							  <option value="professional">Professional</option>
							  <option value="certificate">Certificate</option>
							  <option value="language">Language</option>
						</select>
					</div>
					<div class="form-group col-md-8">						
						<select name="university" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
							<option value="">All Universities</option>
							
							<?php
							if (mysqli_num_rows($uni_result) > 0) {
								// output data of each row
								while($uni_row = mysqli_fetch_assoc($uni_result)) {
							?>
							<option value="<?php echo $uni_row["id"]; ?>"><?php echo $uni_row["name"]; ?></option>
							<?php
									}
								}
							?>	
							
						</select>						
					</div>
				</div>
				
				<div class="input-group">
					<input name="course" type="text" class="form-control " placeholder="Search Course Title">
					<span class="input-group-btn">
						<button class="btn btn-primary " type="submit"><span class="glyphicon glyphicon-search"></span> Search</button>
					</span>
				</div><!-- /input-group -->
			</form>
		</div>

</div>
        <!-- /#page-wrapper -->
		
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>            		
		
	 
<?php require_once(__DIR__.'/../footer.php'); ?>
