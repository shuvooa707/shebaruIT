<?php
/*
#unversity
*/
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php');
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'file-upload.php');
if (isset($_REQUEST['addNew'])) {
	$name = mysqli_escape_string($conn, $_REQUEST['name']);
	$type = mysqli_escape_string($conn, $_REQUEST['type']);
	$location = mysqli_escape_string($conn, $_REQUEST['location']);
	$logo = basename($_FILES["fileUpload"]["name"]);
	
	$sql = "INSERT INTO university(name,type,location,logo) VALUES('$name','$type','$location','$logo')";
	if(mysqli_query($conn,$sql)){
		header('location:index.php');
	}else{
		$err = "Cannot be inserted. ".mysqli_error($conn);
	}
}

require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php');

$sql = "SELECT * FROM university ORDER BY name";
$result = mysqli_query($conn, $sql);
$total = mysqli_num_rows($result);
?>

<div id="page-wrapper">
	<div class="row">
        <div class="col-lg-12">
            <h3>ALL UNIVERSITIES</h3>
			<ol class="breadcrumb">
			  <li class="breadcrumb-item"><a href="/bmscl">Home</a></li>
			  <li class="breadcrumb-item active">All Universities</li>
			</ol>
			<hr>
		</div>
        <!-- /.col-lg-12 -->
    </div>
	<!-- /.row -->
	<?php
	if (isset($err)) {
		echo $err;
	}
	?>
	<!-- Display response messages -->
    <?php if(!empty($resMessage)) {?>
    <div class="alert <?php echo $resMessage['status']?>">
      <?php echo $resMessage['message']?>
    </div>
    <?php }?>

	<h4>TOTAL: <?php echo $total; ?>
	<button class="btn btn-primary btn-outline" style="margin-left:20px" data-toggle="modal" data-target="#addNew"><i class="fa fa-plus"></i> ADD NEW</button>
	</h4><br>
	
	<div class="row">  
		<?php while($row = mysqli_fetch_assoc($result)) { ?>	
		<div class="col-xs-18 col-sm-6 col-md-3" style="height:300px">
			<div class="thumbnail">
				<img src="logo/<?php echo $row['logo']; ?>" style="max-height:150px">
				<div class="caption">
					<h4><?php echo $row['name']; ?></h4>
					<p><?php echo $row['type']; ?></p>
				</div>
			</div>
		</div>  
		<?php } ?>
	</div><!--/row-->

</div>
<!-- /#page-wrapper -->
<!-- Modal -->
<div id="addNew" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New University</h4>
      </div>
      <div class="modal-body">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" name="name" class="form-control" id="name">
			</div>
			<div class="form-group">
				<label class="radio-inline"><input type="radio" name="type" value="Public University"> Public University</label>
				<label class="radio-inline"><input type="radio" name="type" value="Private University"> Private University</label>
			</div>
			<div class="form-group">
				<label for="location">Location:</label>
				<input type="text" name="location" class="form-control" id="location">
			</div>
			<div class="user-image mb-3 text-center">
				<div style="max-width:300px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
					<img src="" class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
				</div>
			</div>

			<div class="custom-file">
				<input type="file" name="fileUpload" class="custom-file-input" id="chooseFile" accept="image/*">
				<label class="custom-file-label" for="chooseFile">Select file</label>
			</div>
			<button type="submit" class="btn btn-primary" name="addNew">Add</button>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>
  <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#imgPlaceholder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#chooseFile").change(function () {
      readURL(this);
    });
  </script>