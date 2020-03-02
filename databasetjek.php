<?php
$servername = "localhost";
$username = "niko";
$password = "123";
$dbname = "stroyer";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

