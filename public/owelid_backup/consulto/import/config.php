<?php
function getdb(){
$servername = "localhost";
$username = "root";
$password = "";
$db = "csv_import_demo";
 
try {
   
    $conn = mysqli_connect($servername, $username, $password, $db);
     //echo "Connected successfully"; 
    }
catch(exception $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
?>