<?php
require_once "connection.php";


  $navn = htmlentities($_POST['navn']);
  $efternavn = htmlentities($_POST['efternavn']);
  

$sql = "INSERT INTO testtable (navn, efternavn)
VALUES ('$navn', '$efternavn')";

if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

header("location: show.php");



mysqli_close($connection);
?>