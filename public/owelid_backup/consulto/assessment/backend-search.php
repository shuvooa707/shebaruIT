<?php require_once($_SERVER['DOCUMENT_ROOT'].'/admin/db_conn.php'); ?>
<?php 
// Escape user inputs for security
if(isset($_REQUEST['queryName']))
{
	$query = mysqli_real_escape_string($conn, $_REQUEST['queryName']);
	$sql = "SELECT * FROM assessment WHERE name LIKE '" . $query . "%'";
}
if(isset($_REQUEST['queryMobile']))
{
	$query = mysqli_real_escape_string($conn, $_REQUEST['queryMobile']);
	$sql = "SELECT * FROM assessment WHERE phone1 LIKE '" . $query . "%'";
}
if(isset($_REQUEST['queryDate']))
{
	$query = mysqli_real_escape_string($conn, $_REQUEST['queryDate']);
	$sql = "SELECT * FROM assessment WHERE date LIKE '" . $query . "%'";
}
if(isset($_REQUEST['Formno']))
{
	$query = mysqli_real_escape_string($conn, $_REQUEST['Formno']);
	$sql = "SELECT * FROM assessment WHERE form_no LIKE '" . $query . "%'";
}
if(isset($_REQUEST['queryFormno']))
{
	$query_formno = mysqli_real_escape_string($conn, $_REQUEST['queryFormno']);
	$sql_formno = "SELECT * FROM assessment WHERE form_no LIKE '" . $query_formno . "%'";
}
 
if(isset($query)){
    // Attempt select query execution
    
    if($result = mysqli_query($conn, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<p><a href='view-assessment.php?id=".$row['id']."'>" . $row['name'] ."-". $row['phone1'] . "</a></p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found for <b>$query</b></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
if(isset($query_formno)){
    // Attempt select query execution
    
    if($result = mysqli_query($conn, $sql_formno)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                echo "<p><a href='edit.php?id=".$row['id']."'>" . $row['name'] ." (". $row['date'] . ")</a></p>";
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found for <b>$query_formno</b></p>";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
// close connection
mysqli_close($conn);
?>