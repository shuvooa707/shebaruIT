<!DOCTYPE html>
<head>
<title>Email Validate</title>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

</head>
<body>

<?php
//validate email list
if(isset($_POST['submit'])){
	//process file upload
	if(file_exists($_FILES['email']['tmp_name']) || is_uploaded_file($_FILES['email']['tmp_name'])) 
	{
		$target_dir = "email/";
		$target_file = $target_dir . basename($_FILES["email"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		// Check file size
		if ($_FILES["email"]["size"] > 1000000) {
			$upload_errors[] = "Your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "csv") {
			$upload_errors[] = "Only csv file is allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$upload_errors[] = "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["email"]["tmp_name"], $target_file)) {
				$upload_success = true;
				if (($getdata = fopen($target_file, "r")) !== FALSE) {
					while (($data = fgetcsv($getdata)) !== FALSE) {
						$fieldCount = count($data);
						for ($c=0; $c < $fieldCount; $c++) {
						$columnData[$c] = $data[$c];
						
						/***trying to recover some email addresses ***/

						//make all lowercase
						$columnData[0] = strtolower($columnData[0]);
						//remove whitespaces at the begining and end
						$columnData[0] = trim($columnData[0]);
						//recover some common mistakes
						$columnData[0] = str_replace(" ","",$columnData[0]);
						$columnData[0] = str_replace(",com",".com",$columnData[0]);
						$columnData[0] = str_replace(".con",".com",$columnData[0]);
						$columnData[0] = str_replace("www.","",$columnData[0]);

						if (filter_var($columnData[0], FILTER_VALIDATE_EMAIL)) {
							$valid_emails[] = $columnData[0];
						}
						if (!filter_var($columnData[0], FILTER_VALIDATE_EMAIL)) {
							$invalid_emails[] = $columnData[0];
						}
						  
						}
					}
					fclose($getdata);
				}
			} else {
				$upload_errors[] = "Sorry, there was an error uploading your file.";
			}
		}
	}
	
}
?>
<div class="container">
	<?php if(isset($upload_errors)){ ?>
	<div class="alert alert-danger">
		<?php
		foreach($upload_errors as $upload_error)
		{
			echo $upload_error."<br>";
		}
		?>
	</div>
	<?php } ?>
		
	<?php if($upload_success){ ?>
	<div class="alert alert-success">
		<?php
		$file = fopen("email/validated_".$_FILES["email"]["name"],"w");
		foreach($valid_emails as $valid_email){
			fputcsv($file,explode(',',$valid_email));
		}
		fclose($file);
		echo "Successfully Exported. <a href='email/validated_".$_FILES["email"]["name"]."' download>Download</a>";
		?>
	</div>
	<?php } ?>
	<div class="row">
		<div class="col-md-6">
			<h3>Valid Email List (<?php echo count($valid_emails); ?>)</h3>
			<ul class="list-group" style="height:200px;overflow:auto;">	
			<?php
			foreach($valid_emails as $valid_email){
				echo "<li class='list-group-item'>".$valid_email."</li>";
			}
			?>
			</ul>
		</div>
		<div class="col-md-6">
			<h3>Invalid Email List (<?php echo count($invalid_emails); ?>)</h3>
			<ul class="list-group" style="height:200px;overflow:auto;">	
			<?php
			foreach($invalid_emails as $invalid_email){
				echo "<li class='list-group-item'>".$invalid_email."</li>";
			}
			?>
			</ul>
		</div>
	</div>
	<form method="post" enctype="multipart/form-data">
		<div class="mx-auto" style="width: 500px;margin-top: 50px">
			<h4>Upload Emails</h4>
			<div class="input-group">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="inputGroupFile04" name="email">
					<label class="custom-file-label" for="inputGroupFile04">Choose file</label>					
				</div>
				<div class="input-group-append">
					<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-upload"></i> Upload</button>
				</div>				
			</div>
			<small class="form-text text-muted">
				Only csv file is allowed.
			</small>
		</div>
	</form>
</div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>