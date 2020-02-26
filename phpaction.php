<?php
// Etablerer forbindelse til serveren
require_once "connection.php";

//Tager informationen fra formen og sætter den i variabler, HTMLentities sørger for at det ikke er skrevet kode i formen. 
  $navn = htmlentities($_POST['navn']);
  $efternavn = htmlentities($_POST['efternavn']);
  
//Sætter sql query til at indsætte data i en variabel
$sql = "INSERT INTO testtable (navn, efternavn)
VALUES ('$navn', '$efternavn')";

//if staement viser om dataen er skrevet eller om der er en error
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

//header sender brugeren videre til show.php 
header("location: show.php");


// lukker forbindelsen til serveren
mysqli_close($connection);
?>