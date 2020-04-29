<?php
// Etablerer forbindelse til serveren
require_once "connection.php";

  //alt den indtastede information om produktet bliver hentet fra post

$email_address = htmlentities ($_POST['email']);
$navn = htmlentities($_POST['navn']);
$efternavn = htmlentities ($_POST['efternavn']);
$addresse = htmlentities($_POST['adresse']);
$postnummer =htmlentities ($_POST['postnummer']);
$city = htmlentities($_POST['city']);
$land =htmlentities ($_POST['land']);
$telefonnummer = htmlentities ($_POST['telefonnummer']);

 //sql kode indsætter alt data om produktet og billedenavnet ind på databasen
$sql = "INSERT INTO ordrer (email, navn, efternavn, adresse, postnummer, city, land, telefonnummer)
VALUES ('$email_address', '$navn', '$efternavn', '$adresse', '$postnummer', '$city', '$land', '$telefonnummer')";
            if (mysqli_query($connection, $sql)) {
          echo "New record created successfully";
          mysqli_close($connection);

          header("location: forside.php?uploadsuccess");
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($connection);


      }




// lukker forbindelsen til serveren
mysqli_close($connection);
?>
