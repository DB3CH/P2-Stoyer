<?php
$servername = "localhost";
$username = "admin1";
$password = "admin1";
$dbname = "test";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>