<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/db_conn.php'); ?>
<?php 
// Escape user inputs for security
if(isset($_REQUEST['approval_id']))
{
	$sql = "UPDATE user SET approval = 1 WHERE id=".$_REQUEST['approval_id'];
	$result = mysqli_query($conn, $sql);
}
?>