<?php 
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php');
 
$class="";
$message='';
$error=0;
$target_dir = 'uploads/';
if(isset($_POST["import"]) && !empty($_FILES)) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
	if($fileType != "csv")  // here we are checking for the file extension. We are not allowing othre then (.csv) extension .
	{
		$message .= "Sorry, only CSV file is allowed.<br>";
		$error=1;
	}
	else
	{
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$message .="File uplaoded successfully.<br>";
 
			if (($getdata = fopen($target_file, "r")) !== FALSE) {
			   fgetcsv($getdata);   
			   while (($data = fgetcsv($getdata)) !== FALSE) {
					$fieldCount = count($data);
					for ($c=0; $c < $fieldCount; $c++) {
					  $columnData[$c] = $data[$c];
					}
			 $data_course = mysqli_real_escape_string($conn ,$columnData[0]);
			 $data_program = mysqli_real_escape_string($conn ,$columnData[1]);
			 $data_duration = mysqli_real_escape_string($conn ,$columnData[2]);
			 $data_nos = mysqli_real_escape_string($conn ,$columnData[3]);
			 $data_emgs = mysqli_real_escape_string($conn ,$columnData[4]);
			 $data_misc = mysqli_real_escape_string($conn ,$columnData[5]);
			 $data_ttf = mysqli_real_escape_string($conn ,$columnData[6]);
			 $data_intake = mysqli_real_escape_string($conn ,$columnData[7]);
			 $data_desc = mysqli_real_escape_string($conn ,$columnData[8]);
			 $data_remarks = mysqli_real_escape_string($conn ,$columnData[9]);
			 $data_discount = mysqli_real_escape_string($conn ,$columnData[10]);
			 $data_doc_title = mysqli_real_escape_string($conn ,$columnData[11]);
			 $data_doc_link = mysqli_real_escape_string($conn ,$columnData[12]);
			 $data_uid = mysqli_real_escape_string($conn ,$columnData[13]);
			 $import_data[]="('".$data_course."','".$data_program."','".$data_duration."','".$data_nos."','".$data_emgs."','".$data_misc."','".$data_ttf."','".$data_intake."','".$data_desc."','".$data_remarks."','".$data_discount."','".$data_doc_title."','".$data_doc_link."','".$data_uid."')";
			// SQL Query to insert data into DataBase
 
			 }
			 $import_data = implode(",", $import_data);
			 $query = "INSERT INTO course(course,program,duration,nos,emgs,misc,ttf,intake,description,remarks,discount,doc_title,doc_link,uid) VALUES  $import_data ;";
			 $result = mysqli_query($conn,$query);
			 $message .="Data imported successfully.";
			 fclose($getdata);
			}
 
		} else {
			$message .= "Sorry, there was an error uploading your file.";
			$error=1;
		}
	}
}
$class="warning";
if($error!=1)
{
	$class="success";
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<title>Import</title>
</head>
<body>
 
<div class="container" style="margin-top:20px; margin-bottom:20px;padding:10px;">
<?php
	if(!empty($message))
	{
?>
<div class="btn-<?php echo $class;?>" style="width:30%;padding:10px;margin-bottom:20px;">
<?php
		echo $message;
 
 ?>
</div>
<?php } ?>
 
<form role="form" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" enctype="multipart/form-data">
<fieldset class="form-group">
	<div class="form-group">
	<input type="file" name="fileToUpload" id="fileToUpload">
	<label for="image upload" class="control-label">Only .csv file is allowed. </label>
	</div>
	<div class="form-group">
    <input type="submit" class="btn btn-warning" value="Import Data" name="import">
	</div>
	</fieldset>
</form>
</div>
</body>
</html>