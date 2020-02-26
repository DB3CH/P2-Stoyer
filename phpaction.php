<?php
$servername = "localhost";
$username = "admin1";
$password = "admin1";
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


  $navn = htmlentities($_POST['navn']);
  $efternavn = htmlentities($_POST['efternavn']);
  

$sql = "INSERT INTO testtable (navn, efternavn)
VALUES ('$navn', '$efternavn')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    Sleep(5);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}





mysqli_close($conn);
?>