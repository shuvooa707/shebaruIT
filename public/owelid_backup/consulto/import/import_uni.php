<?php
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php');
 
$class="";
$message='';
$error=0;
$target_dir = dirname(__FILE__)."/Uploads/";
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
			 $option_name = mysqli_real_escape_string($conn ,$columnData[0]);
			 $option_value = mysqli_real_escape_string($conn ,$columnData[1]);
			 $import_data[]="('".$option_name."','".$option_value."')";
			// SQL Query to insert data into DataBase
 
			 }
			 $import_data = implode(",", $import_data);
			 $query = "INSERT INTO university(id,name) VALUES  $import_data ;";
			 $result = mysqli_query($conn,$query);
			 $message .="Data imported successfully.";
			 fclose($getdata);
			}
 
		} else {
			$message .="Sorry, there was an error uploading your file.";
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