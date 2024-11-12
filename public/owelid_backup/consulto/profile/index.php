<?php
/*
#Profile
*/
?>
<?php
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../header.php');

//Get current user ID from session
$userId = $row_user['id'];

//Get user data from database
$result = mysqli_query($conn, "SELECT * FROM user WHERE id = $userId");
$row = mysqli_fetch_assoc($result);

//User profile picture
$userPicture = !empty($row['photo'])?$row['photo']:'default-avatar.jpg';
$userPictureURL = 'images/'.$userPicture;
?>
<div id="page-wrapper">
	<div class="page-title">
	  <div class="title_left">
		<h3>User Profile</h3>
	  </div>
    </div>
    <!-- /.row -->		
	<div class="row">
		<div class="col-md-3" style="background:#EEE">
			<div class="img-relative">
				<!-- Loading image -->
				<div class="overlay uploadProcess" style="display: none;">
					<div class="overlay-content"><img src="images/loading.gif"/></div>
				</div>
				<!-- Hidden upload form -->
				<form method="post" action="upload.php" enctype="multipart/form-data" id="picUploadForm" target="uploadTarget">
					<input type="file" name="picture" id="fileInput" accept="image/*"  style="display:none"/>
				</form>
				<iframe id="uploadTarget" name="uploadTarget" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
				<!-- Image update link -->
				<a class="editLink" href="javascript:void(0);"><i class="fa fa-edit fa-fw"></i> Change Photo</a>
				<!-- Profile image -->
				<img width="100%" class="img-rounded" src="<?php echo file_exists($userPictureURL)? $userPictureURL:'images/default-avatar.jpg'?>" id="imagePreview">
			</div>
			<p align="center" style="color:#EE4811;margin-top:20px; font-size:20px;text-transform:uppercase "><?php echo $row_user["name"]; ?></p>
			<p align="center"><?php echo $row_user["designation"]; ?></p><hr>
			<p align="center" style="margin-bottom:30px">
				<a href="profile-edit.php" class="btn btn-default" style=""><i class="fa fa-edit fa-fw"></i> EDIT</a>
				<a href="#profile-setting.php" class="btn btn-default" style=""><i class="fa fa-gear fa-fw"></i> SETTING</a>
			</p>
		</div>
		<div class="col-md-9" style="padding-left:50px">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
				<li><a data-toggle="tab" href="#contact">Contact</a></li>
			</ul>

			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<form>
						<div class="form-group">
							<label></label>
							<textarea class="form-control" rows="3" placeholder="What's on your mind...."></textarea>
						</div>
						<button type="submit" class="btn btn-primary">POST</button>
					</form>
				</div>
				<div id="contact" class="tab-pane fade">
					<h3>Contact Details</h3>
					<p><i class="fa fa-phone fa-fw"></i> <?php if($row_user["phone1"]=="") echo "<a href='profile-edit.php'>Add Office Mobile 1</a>"; else echo $row_user["phone1"]; ?></p>
					<p><i class="fa fa-phone fa-fw"></i> <?php if($row_user["phone2"]=="") echo "<a href='profile-edit.php'>Add Office Mobile 2</a>"; else echo $row_user["phone2"]; ?></p>
					<p><i class="fa fa-phone fa-fw"></i> <?php if($row_user["pphone"]=="") echo "<a href='profile-edit.php'>Add Personal Mobile</a>"; else echo $row_user["pphone"]." <i>(Personal)</i>"; ?></p>
					<p><i class="fa fa-phone fa-fw"></i> <?php if($row_user["email"]=="") echo "<a href='profile-edit.php'>Add Email</a>"; else echo $row_user["email"]; ?></p>
				</div>
			</div>
		</div>
				

	</div>
	  
</div>
<!-- /#page-wrapper -->
	

	

<?php require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../footer.php'); ?>
<script type="text/javascript">
$(document).ready(function () {
    //If image edit link is clicked
    $(".editLink").on('click', function(e){
        e.preventDefault();
        $("#fileInput:hidden").trigger('click');
    });

    //On select file to upload
    $("#fileInput").on('change', function(){
        var image = $('#fileInput').val();
        var img_ex = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        
        //validate file type
        if(!img_ex.exec(image)){
            alert('Please upload only .jpg/.jpeg/.png/.gif file.');
            $('#fileInput').val('');
            return false;
        }else{
            $('.uploadProcess').show();
            $('#uploadForm').hide();
            $( "#picUploadForm" ).submit();
        }
    });
});

//After completion of image upload process
function completeUpload(success, fileName) {
    if(success == 1){
        $('#imagePreview').attr("src", "");
        $('#imagePreview').attr("src", fileName);
        $('#fileInput').attr("value", fileName);
        $('.uploadProcess').hide();
    }else{
        $('.uploadProcess').hide();
        alert('There was an error during file upload!');
    }
    return true;
}
</script>