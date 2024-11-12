<?php
/*
#Forms > Money Receipt
*/

require_once(rtrim(dirname(__FILE__), '/\\') . DIRECTORY_SEPARATOR .'../../db_conn.php'); 

$doc_type = $_POST['doc_type'];
$doc_no = $_POST['doc_no'];

if($doc_type=='GD No'){
	$from="student";
	$where="gd_no";
}
else{
	$from="assessment";
	$where="form_no";
}

$query_student = "SELECT name FROM $from WHERE $where=$doc_no";
$result_student = mysqli_query($conn, $query_student);
$row_student = mysqli_fetch_array($result_student);

echo $row_student['name'];
?>
