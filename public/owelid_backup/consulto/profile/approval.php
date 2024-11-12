<?php require_once($_SERVER['DOCUMENT_ROOT'].'/bmscl/db_conn.php'); ?>

<?php
	$approval_id = $_POST["approval_id"];
	$sql = "UPDATE user SET approval=1 WHERE id=$approval_id";
	$result_sql = mysqli_query($conn,$sql) or die(mysql_error());
?>