<?php
require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../db_conn.php');
$success_count=0;
$target_file = "uploads/updated_2018/".$_POST['file'];
if (($getdata = fopen($target_file, "r")) !== FALSE) {
$first_row = fgetcsv($getdata);

//check if the last column is id. if not disable the the proceed button
if(end($first_row)!=='id'){
	$match_error = true;
	$match_error_msg = "The last column of the csv file must be 'id'.<br>";
}
	

//print_r($first_row);
while (($data = fgetcsv($getdata)) !== FALSE) {
		
		//get the id from the last node
		$id = end($data);

		//take out the id from data
		array_pop($data);

		//make all_data empty after every loop
		$all_data = [];

		//store the data of a single row
	$fieldCount = count($data);
	for ($c=0; $c < $fieldCount; $c++) {
	  $all_data[] = $first_row[$c]."='".$data[$c]."', ";
	}

	//remove the last comma
	$all_data[$fieldCount-1] = rtrim($all_data[$fieldCount-1], ', ');

	$query = "UPDATE course set ";
	foreach ($all_data as $value) {
		$query .= $value;
	}
	$query .= " WHERE id=".$id."; ";

	$all_query .= $query;
	 if(mysqli_multi_query($conn,$all_query)){
		do
		{
		// Store first result set
		if ($result=mysqli_store_result($conn)) {
		  // Fetch one and one row
		  while ($row=mysqli_fetch_row($result))
			{
			printf("%s\n",$row[0]);
			}
		  // Free result set
		  mysqli_free_result($result);
		  }
		}
		while (mysqli_next_result($conn));
			$success_count++;
		 }
	else
		$fail_count++;
}
if ($success_count>0) {
	$success .=$success_count." rows updated successfully.";
}
if(isset($fail_count))
$error=$fail_count." rows did not updated!";
fclose($getdata);
}
if(isset($success)) echo "<span class='text-success'><i class='fas fa-check mr-2 ml-4'></i>".$success."</span><br>";
if(isset($error)) echo "<span class='text-danger'><strong>Error:</strong> ".$error."</span>";
?>