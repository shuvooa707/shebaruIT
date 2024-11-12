<?php 
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php');
$query_column = "SHOW COLUMNS FROM course";
$result_column = mysqli_query($conn,$query_column);
while($row_column=mysqli_fetch_array($result_column)){
	$columns[] = $row_column[0];
}
$msg_class="";
$message='';
$error=0;
$success_count=0;
$fail_count=0;
$target_dir = rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'/uploads/updated_2018/';
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
			$message .="<div class='alert alert-info'>File Uplaoded. Please check if the collumn list is matched and confirm import.</div>";
 
			if (($getdata = fopen($target_file, "r")) !== FALSE) {
			   $first_row = fgetcsv($getdata);

			   //check if the last column is id. if not disable the the proceed button
			   if(end($first_row)!=='id'){
			   	$match_error = true;
			   	$match_error_msg = "The last column of the csv file must be 'id'.<br>";
			   }
			   	

			 
			 fclose($getdata);
			}
 
		} else {
			$message .= "Sorry, there was an error uploading your file.";
			$error=1;
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Import to Update Course</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<body>
<div class="container ">
<div class="mx-auto" style="width: 500px;margin: 50px">

<form role="form" action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post" enctype="multipart/form-data">
	<h4>Upload CSV</h4>
	<div class="input-group">
		<div class="custom-file">
			<input type="file" class="custom-file-input" id="inputGroupFile04" name="fileToUpload">
			<label class="custom-file-label" for="inputGroupFile04">Choose file</label>					
		</div>
		<div class="input-group-append">
			<button class="btn btn-primary" type="submit" name="import"><i class="fa fa-upload"></i> Upload</button>
		</div>				
	</div>
	<small class="form-text text-muted">
		Only .csv file is allowed.
	</small>
</form>
<hr>
<?php
if(!empty($message))
{
?>
<?php echo $message; ?>
<h1 class="display-4">Data Mapping</h1>
  <table class="table">
    <thead>
      <tr>
        <th>CSV Row</th>
        <th>Database Row</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $numItems = count($first_row);
	$i = 0;
    foreach ($first_row as $value) {
	if(++$i === $numItems && $value !== 'id') {
	    echo "<tr class='border border-danger' style='border-top:2px solid #dc3545 !important'>";
	}
	elseif (!in_array($value, $columns)) {
		echo "<tr class='border border-danger' style='border-top:2px solid #dc3545 !important'>";
	}
	else echo "<tr>";
	echo "<td>$value</td>";
	echo "<td>";
	if (in_array($value, $columns))
		{
		echo "<span class='text-success'>".$value."</span>";
		}
	else
		{
		echo "<span class='text-danger'>Not Found</span>";
		$match_error = true;
		$match_error_msg .= "The column name '".$value."' does not match with database column. Please go to csv file and change it.<br>";
		}
	echo "</td>";
	echo"</tr>";
  	}
    ?>
    </tbody>
  </table>
  <p class="text-danger"><?php if ($match_error) echo $match_error_msg; ?></p>
  <button id="confirm" class="btn btn-primary" <?php if ($match_error) echo "disabled"; ?>>Confirm & Proceed <i class="fas fa-arrow-right"></i></button>
  <span id="wait" style="display:none;"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></span>
  <span id="msg"></span>

<?php
}
if($fail_count>0)
	echo "<div class='alert alert-warning'>".$fail_count." rows failed</div>"
?>

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $(document).ajaxStart(function(){	    	
	        $("#wait").show();
	    });
	    $(document).ajaxComplete(function(){
	        $("#wait").hide();
	    });
	    $("#confirm").click(function(){
		    $.ajax({url: "ajax_import.php", 
		    		method:'post', 
		    		data:"file=<?php echo basename($_FILES["fileToUpload"]["name"]); ?>", 
		    		success: function(result){
		        		$("#msg").html(result);
		    		},
		    		statusCode: {
					    404: function() {
					      alert( "page not found" );
					    }
					}
				});
		});
	});
	
</script>
</body>
</html>