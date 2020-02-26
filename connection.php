<?php
// Indsæt loginoplysninger til databasen i variabler.
$servername = "localhost";
$username = "admin1";
$password = "admin1";
$dbname = "test";

// Etablerer forbindelsen.
$connection = mysqli_connect($servername, $username, $password, $dbname);
// chekker forbindelsen.
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>