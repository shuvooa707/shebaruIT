<?php
$servername = "localhost";
$username = "owelwllt_consulto";
$password = "NadYwAEip2)l";
$dbname = "owelwllt_consulto";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}
?>