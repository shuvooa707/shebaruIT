<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	if($(".unmatched").length>0) {
		$(function() {
		  $('.unmatched').on('change', function() {
			var $sels = $('.unmatched option:selected[value=""]');
			$("#importBtn").attr("disabled", $sels.length > 0);
		  }).change();
		});
	}
});
</script>

<script>

</script>
</head>

<body>
<div class="container">
<h1>Databse Mapping</h1>

<?php
//load the database configuration file
include 'dbConfig.php';

if(isset($_POST['importSubmit'])){
    
    //validate whether uploaded file is a csv file
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            //open uploaded csv file with read only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
			//declare an empty array
			$db_row = [];
			
			$query_collumn=$db->query("SHOW COLUMNS FROM members");			
			while($row_collumn=mysqli_fetch_assoc($query_collumn))
			{
				//fill the empty array with collumn name
				array_push($db_row,$row_collumn['Field']);
			}
            
			//separate first line
            $first_line=fgetcsv($csvFile);
			
			echo "<table class='table table-striped'>
					<tr>
						<th>Import Row</th>
						<th>Database Row</th>
					</tr>";
			foreach($first_line as $x) {
				echo "<tr>";
				echo "<td>" . $x . "</td>";
				echo "<td>";
				if(in_array(trim(strtolower($x)),$db_row))
					echo $db_row[array_search(trim(strtolower($x)),$db_row)];
				else{
					echo "<span class='text-danger'>Not matched! </span>";
					echo "<select class='unmatched'>";
					echo "<option value=''>Select One</option>";
					foreach($db_row as $x2) {
					echo"<option value='$x2'>$x2</option>";
					}
					echo "</select>";
					echo "<div></div>";
					echo "</td>";
					echo "</tr>";
				}
			}
			echo "</table>";
            echo "<button id='importBtn' class='btn btn-primary'>Confirm & Import</button>";
            //parse data from csv file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                //check whether member already exists in database with same email
                $prevQuery = "SELECT id FROM members WHERE email = '".$line[1]."'";
                $prevResult = $db->query($prevQuery);
                if($prevResult->num_rows > 0){
                    //update member data
                    //$db->query("UPDATE members SET name = '".$line[0]."', phone = '".$line[2]."', created = '".$line[3]."', modified = '".$line[3]."', status = '".$line[4]."' WHERE email = '".$line[1]."'");
                }else{
                    //insert member data into database
                    //$db->query("INSERT INTO members (name, email, phone, created, modified, status) VALUES ('".$line[0]."','".$line[1]."','".$line[2]."','".$line[3]."','".$line[3]."','".$line[4]."')");
                }
            }
            
            //close opened csv file
            fclose($csvFile);

            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}

//redirect to the listing page
//header("Location: import3.php".$qstring);
?>
</body>
</html>